<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKaryawanModel;
use App\Models\Karyawan;
use App\Models\KPI;
use Illuminate\Http\Request;
use App\Models\Departemen;

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

        // Persiapkan matriks penilaian karyawan
        $matrix = [];
        foreach ($penilaianKaryawan as $nilai) {
            if (!$nilai->karyawan) continue;

            // Ambil bobot KPI berdasarkan divisi karyawan
            $kpiBobot = KPI::where('divisi_id', $nilai->karyawan->divisi_id)
                ->get()
                ->pluck('bobot', 'simbol')
                ->toArray();

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
                'c9' => $nilai->c9,
                'c10' => $nilai->c10,
            ];

            // Tambahkan data ke matriks utama
            $matrix[] = [
                'id_karyawan' => $nilai->karyawan->id,
                'nama' => $nilai->karyawan->nama,
                'divisi' => $nilai->karyawan->divisi->nama ?? 'N/A',
                'outlet' => $nilai->karyawan->outlet->nama ?? 'N/A',
                'nilai' => $nilaiArray,
                'bobot' => $kpiBobot
            ];
        }

        // Langkah-langkah metode TOPSIS
        $normalizedMatrix = $this->normalizeMatrix($matrix); // Normalisasi matriks
        $weightedMatrix = $this->weightedMatrix($normalizedMatrix); // Matriks berbobot
        $idealSolutions = $this->findIdealSolutions($weightedMatrix); // Solusi ideal positif dan negatif
        $distances = $this->calculateDistances($weightedMatrix, $idealSolutions); // Hitung jarak ke solusi ideal
        $preferences = $this->calculatePreferences($distances); // Hitung skor preferensi

        // Susun hasil akhir untuk ditampilkan
        $results = [];
        foreach ($matrix as $data) {
            $totalNilai = array_sum($data['nilai']); // Total nilai tanpa bobot

            $results[] = [
                'nama' => $data['nama'],
                'divisi' => $data['divisi'],
                'outlet' => $data['outlet'],
                'nilai' => $data['nilai'],
                'total_nilai' => $totalNilai,
                'topsis_score' => isset($preferences[$data['id_karyawan']]) ? $preferences[$data['id_karyawan']] * 100 : 0,
                'mendapat_bonus' => $totalNilai >= 60 // Kriteria tambahan untuk mendapatkan bonus
            ];
        }

        // Urutkan hasil berdasarkan skor TOPSIS secara descending
        usort($results, function($a, $b) {
            return $b['topsis_score'] - $a['topsis_score'];
        });

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
                'id_karyawan' => $row['id_karyawan'],
                'bobot' => $row['bobot']
            ];

            foreach ($row['nilai'] as $criteria => $value) {
                $normalizedRow[$criteria] = $value / sqrt($sumSquared[$criteria]);
            }
            $normalized[] = $normalizedRow;
        }

        return $normalized;
    }

    // Fungsi untuk menghitung matriks berbobot
    private function weightedMatrix($normalizedMatrix)
    {
        $weighted = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = ['id_karyawan' => $row['id_karyawan']];
            $bobot = $row['bobot'];

            foreach ($row as $criteria => $value) {
                if ($criteria !== 'id_karyawan' && $criteria !== 'bobot') {
                    $weight = isset($bobot[strtoupper($criteria)]) ? $bobot[strtoupper($criteria)] / 100 : 0;
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
}
