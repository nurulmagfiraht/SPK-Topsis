<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKaryawanModel;
use App\Models\Karyawan;
use App\Models\KPI;
use Illuminate\Http\Request;
use App\Models\Departemen;
use Barryvdh\DomPDF\Facade\Pdf;

class SPKController extends Controller
{
    // Fungsi utama untuk menampilkan hasil perhitungan TOPSIS
    public function index()
    {
        // Ambil data penilaian karyawan beserta relasi divisi dan outlet
        $penilaianKaryawan = PenilaianKaryawanModel::with(['karyawan.divisi', 'karyawan.outlet'])->get();
        // Ambil daftar departemen untuk ditampilkan di halaman
        $departemenList = Departemen::all();

        // Jika tidak ada data penilaian karyawan, kembalikan halaman kosong
        if ($penilaianKaryawan->isEmpty()) {
            return view('admin.admin-hasilspk', [
                'results' => [],
                'departemenList' => $departemenList
            ]);
        }

        // Bobot untuk kriteria
        $weights = [
            'c1' => 0.30,
            'c2' => 0.13,
            'c3' => 0.12,
            'c4' => 0.10,
            'c5' => 0.10,
            'c6' => 0.10,
            'c7' => 0.05,
            'c8' => 0.10
        ];

        // Persiapkan matriks penilaian karyawan
        $matrix = [];
        foreach ($penilaianKaryawan as $nilai) {
            if (!$nilai->karyawan) continue;

            // Susun data nilai karyawan
            $nilaiArray = [
                'c1' => $nilai->c1,
                'c2' => $nilai->c2,
                'c3' => $nilai->c3,
                'c4' => $nilai->c4,
                'c5' => $nilai->c5,
                'c6' => $nilai->c6,
                'c7' => $nilai->c7,
                'c8' => $nilai->c8,
            ];

            // Tambahkan data ke matriks utama
            $matrix[] = [
                'id_karyawan' => $nilai->karyawan->id,
                'nama' => $nilai->karyawan->nama,
                'divisi' => $nilai->karyawan->divisi->nama ?? 'N/A',
                'outlet' => $nilai->karyawan->outlet->nama ?? 'N/A',
                'nilai' => $nilaiArray
            ];
        }

        // Langkah-langkah metode TOPSIS
        $normalizedMatrix = $this->normalizeMatrix($matrix); // Normalisasi matriks
        $weightedMatrix = $this->weightedMatrix($normalizedMatrix, $weights); // Matriks berbobot
        $idealSolutions = $this->findIdealSolutions($weightedMatrix); // Solusi ideal positif dan negatif
        $distances = $this->calculateDistances($weightedMatrix, $idealSolutions); // Hitung jarak ke solusi ideal
        $preferences = $this->calculatePreferences($distances); // Hitung skor preferensi

        // Susun hasil akhir untuk ditampilkan
        $results = [];
        foreach ($matrix as $data) {
            $totalNilai = array_sum($data['nilai']); // Total nilai tanpa bobot
            $topsisScore = isset($preferences[$data['id_karyawan']]) ? $preferences[$data['id_karyawan']] : 0;

            $results[] = [
                'id_karyawan' => $data['id_karyawan'],
                'nama' => $data['nama'],
                'divisi' => $data['divisi'],
                'outlet' => $data['outlet'],
                'nilai' => $data['nilai'],
                'total_nilai' => $totalNilai,
                'topsis_score' => $topsisScore * 100, // Skor dalam persen
                'topsis_raw' => $topsisScore, // Nilai mentah TOPSIS (0-1)
                'preferensi_score' => number_format($topsisScore, 4), // Format 4 desimal
                'mendapat_bonus' => $totalNilai >= 60 // Kriteria tambahan untuk mendapatkan bonus
            ];
        }

        // Urutkan hasil berdasarkan skor TOPSIS secara descending
        usort($results, function($a, $b) {
            return $b['topsis_raw'] - $a['topsis_raw'];
        });

        // Tambahkan ranking setelah diurutkan
        foreach ($results as $index => &$result) {
            $result['ranking'] = $index + 1;
        }

        // Kembalikan hasil ke view
        return view('admin.admin-hasilspk', [
            'results' => $results,
            'departemenList' => $departemenList
        ]);
    }

    // Fungsi untuk normalisasi matriks
    private function normalizeMatrix($matrix)
    {
        $sumSquared = array_fill_keys(array_keys($matrix[0]['nilai']), 0.00001); // Inisialisasi dengan nilai kecil

        // Hitung jumlah kuadrat untuk setiap kriteria
        foreach ($matrix as $row) {
            foreach ($row['nilai'] as $criteria => $value) {
                $sumSquared[$criteria] += pow($value, 2);
            }
        }

        // Normalisasi nilai dengan rumus nilai / akar jumlah kuadrat
        $normalized = [];
        foreach ($matrix as $row) {
            $normalizedRow = [
                'id_karyawan' => $row['id_karyawan']
            ];

            foreach ($row['nilai'] as $criteria => $value) {
                $normalizedRow[$criteria] = $value / sqrt($sumSquared[$criteria]);
            }
            $normalized[] = $normalizedRow;
        }

        return $normalized;
    }

    // Fungsi untuk menghitung matriks berbobot
    private function weightedMatrix($normalizedMatrix, $weights)
    {
        $weighted = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = ['id_karyawan' => $row['id_karyawan']];
            
            foreach ($row as $criteria => $value) {
                if ($criteria !== 'id_karyawan') {
                    $weight = isset($weights[$criteria]) ? $weights[$criteria] : 0;
                    $weightedRow[$criteria] = $value * $weight;
                }
            }
            $weighted[] = $weightedRow;
        }

        return $weighted;
    }

    // Fungsi untuk menemukan solusi ideal positif dan negatif
    private function findIdealSolutions($weightedMatrix)
    {
        $positive = [];
        $negative = [];

        foreach (array_keys($weightedMatrix[0]) as $criteria) {
            if ($criteria !== 'id_karyawan') {
                $values = array_column($weightedMatrix, $criteria);
                $positive[$criteria] = max($values); // Solusi ideal positif
                $negative[$criteria] = min($values); // Solusi ideal negatif
            }
        }

        return [
            'positive' => $positive,
            'negative' => $negative
        ];
    }

    // Fungsi untuk menghitung jarak ke solusi ideal
    private function calculateDistances($weightedMatrix, $idealSolutions)
    {
        $distances = [];
        foreach ($weightedMatrix as $row) {
            $id = $row['id_karyawan'];
            $positiveDistance = 0;
            $negativeDistance = 0;

            foreach ($row as $criteria => $value) {
                if ($criteria !== 'id_karyawan') {
                    $positiveDistance += pow($value - $idealSolutions['positive'][$criteria], 2);
                    $negativeDistance += pow($value - $idealSolutions['negative'][$criteria], 2);
                }
            }

            $distances[$id] = [
                'positive' => sqrt($positiveDistance) + 0.00001,
                'negative' => sqrt($negativeDistance) + 0.00001
            ];
        }
        return $distances;
    }

    // Fungsi untuk menghitung skor preferensi berdasarkan jarak solusi ideal
    private function calculatePreferences($distances)
    {
        $preferences = [];
        foreach ($distances as $id => $distance) {
            $denominator = ($distance['positive'] + $distance['negative']);
            $preferences[$id] = $denominator != 0 ? 
                $distance['negative'] / $denominator : 
                0;
        }
        return $preferences;
    }


    public function exportToPDF()
{
    // Ambil data penilaian karyawan dan daftar departemen
    $penilaianKaryawan = PenilaianKaryawanModel::with(['karyawan.divisi', 'karyawan.outlet'])->get();
    $departemenList = Departemen::all();

    // Bobot untuk kriteria (jika perlu)
    $weights = [
        'c1' => 0.30,
        'c2' => 0.13,
        'c3' => 0.12,
        'c4' => 0.10,
        'c5' => 0.10,
        'c6' => 0.10,
        'c7' => 0.05,
        'c8' => 0.10
    ];

    // Matriks penilaian karyawan dan hasil TOPSIS (menggunakan langkah-langkah yang sudah ada)
    $matrix = [];
    foreach ($penilaianKaryawan as $nilai) {
        if (!$nilai->karyawan) continue;
        $nilaiArray = [
            'c1' => $nilai->c1,
            'c2' => $nilai->c2,
            'c3' => $nilai->c3,
            'c4' => $nilai->c4,
            'c5' => $nilai->c5,
            'c6' => $nilai->c6,
            'c7' => $nilai->c7,
            'c8' => $nilai->c8,
        ];

        $matrix[] = [
            'id_karyawan' => $nilai->karyawan->id,
            'nama' => $nilai->karyawan->nama,
            'divisi' => $nilai->karyawan->divisi->nama ?? 'N/A',
            'outlet' => $nilai->karyawan->outlet->nama ?? 'N/A',
            'nilai' => $nilaiArray
        ];
    }

    // Langkah-langkah metode TOPSIS (gunakan metode seperti sebelumnya)
    $normalizedMatrix = $this->normalizeMatrix($matrix);
    $weightedMatrix = $this->weightedMatrix($normalizedMatrix, $weights);
    $idealSolutions = $this->findIdealSolutions($weightedMatrix);
    $distances = $this->calculateDistances($weightedMatrix, $idealSolutions);
    $preferences = $this->calculatePreferences($distances);

    $results = [];
    foreach ($matrix as $data) {
        $totalNilai = array_sum($data['nilai']);
        $results[] = [
            'nama' => $data['nama'],
            'divisi' => $data['divisi'],
            'outlet' => $data['outlet'],
            'nilai' => $data['nilai'],
            'total_nilai' => $totalNilai,
            'topsis_score' => isset($preferences[$data['id_karyawan']]) ? $preferences[$data['id_karyawan']] * 100 : 0,
            'mendapat_bonus' => $totalNilai >= 60
        ];
    }

    // Urutkan hasil berdasarkan skor TOPSIS secara descending
    usort($results, function($a, $b) {
        return $b['topsis_score'] - $a['topsis_score'];
    });

    // Persiapkan data yang akan dikirim ke view PDF
    $pdf = Pdf::loadView('admin.admin-hasilspk-pdf', [
        'results' => $results,
        'departemenList' => $departemenList
    ]);

    // Return PDF untuk diunduh
    return $pdf->download('hasil_spk_karyawan.pdf');
}

}
