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
public function index(Request $request)
 {
    // Ambil parameter filter dari request
    $bulan = $request->get('bulan');
    $tahun = $request->get('tahun');
    
    // Query dasar untuk penilaian karyawan
    $query = PenilaianKaryawanModel::with(['karyawan.divisi', 'karyawan.outlet']);
    
    // Terapkan filter jika ada
    if ($bulan && $tahun) {
        $query->whereMonth('created_at', $bulan)
              ->whereYear('created_at', $tahun);
    } elseif ($tahun) {
        $query->whereYear('created_at', $tahun);
    }
    
    // Ambil data penilaian karyawan
    $penilaianKaryawan = $query->get();
    
    // Ambil daftar departemen untuk ditampilkan di halaman
    $departemenList = Departemen::all();

    // Jika tidak ada data penilaian karyawan, kembalikan halaman kosong
    if ($penilaianKaryawan->isEmpty()) {
        return view('admin.admin-hasilspk', [
            'results' => [],
            'departemenList' => $departemenList,
            'selectedBulan' => $bulan,
            'selectedTahun' => $tahun
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
            'nilai' => $nilaiArray,
            'tanggal_penilaian' => $nilai->created_at
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
            'mendapat_bonus' => $totalNilai >= 60, // Kriteria tambahan untuk mendapatkan bonus
            'tanggal_penilaian' => $data['tanggal_penilaian']
        ];
    }

    // Urutkan hasil berdasarkan skor TOPSIS secara descending
    usort($results, function($a, $b) {
        // Pastikan comparison yang tepat untuk float
        if ($a['topsis_raw'] == $b['topsis_raw']) {
            return 0;
        }
        return ($a['topsis_raw'] < $b['topsis_raw']) ? 1 : -1;
    });

    // Tambahkan ranking setelah diurutkan
    foreach ($results as $index => &$result) {
        $result['ranking'] = $index + 1;
    }

    // Kembalikan hasil ke view
    return view('admin.admin-hasilspk', [
        'results' => $results,
        'departemenList' => $departemenList,
        'selectedBulan' => $bulan,
        'selectedTahun' => $tahun
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


public function exportToPDF(Request $request)
 {
    // Ambil parameter filter dari request
    $bulan = $request->get('bulan');
    $tahun = $request->get('tahun');
    $printAll = $request->get('print_all', false); // Parameter untuk print semua data
    
    // Query dasar untuk penilaian karyawan
    $query = PenilaianKaryawanModel::with(['karyawan.divisi', 'karyawan.outlet']);
    
    // Terapkan filter jika bukan print all
    if (!$printAll) {
        if ($bulan && $tahun) {
            $query->whereMonth('created_at', $bulan)
                  ->whereYear('created_at', $tahun);
        } elseif ($tahun) {
            $query->whereYear('created_at', $tahun);
        }
    }
    
    // Ambil data penilaian karyawan
    $penilaianKaryawan = $query->get();
    $departemenList = Departemen::all();

    // Jika tidak ada data penilaian karyawan, kembalikan response error
    if ($penilaianKaryawan->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada data penilaian karyawan untuk diekspor.');
    }

    // Bobot untuk kriteria (sama dengan halaman index)
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

    // Persiapkan matriks penilaian karyawan (sama dengan method index)
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
            'nilai' => $nilaiArray,
            'tanggal_penilaian' => $nilai->created_at
        ];
    }

    // Langkah-langkah metode TOPSIS (sama dengan method index)
    $normalizedMatrix = $this->normalizeMatrix($matrix); // Normalisasi matriks
    $weightedMatrix = $this->weightedMatrix($normalizedMatrix, $weights); // Matriks berbobot
    $idealSolutions = $this->findIdealSolutions($weightedMatrix); // Solusi ideal positif dan negatif
    $distances = $this->calculateDistances($weightedMatrix, $idealSolutions); // Hitung jarak ke solusi ideal
    $preferences = $this->calculatePreferences($distances); // Hitung skor preferensi

    // Susun hasil akhir untuk ditampilkan (sama dengan method index)
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
            'mendapat_bonus' => $totalNilai >= 60, // Kriteria tambahan untuk mendapatkan bonus
            'tanggal_penilaian' => $data['tanggal_penilaian']
        ];
    }

    // Urutkan hasil berdasarkan skor TOPSIS secara descending (sama dengan method index)
    usort($results, function($a, $b) {
        // Pastikan comparison yang tepat untuk float
        if ($a['topsis_raw'] == $b['topsis_raw']) {
            return 0;
        }
        return ($a['topsis_raw'] < $b['topsis_raw']) ? 1 : -1;
    });

    // Tambahkan ranking setelah diurutkan (sama dengan method index)
    foreach ($results as $index => &$result) {
        $result['ranking'] = $index + 1;
    }

    // Tentukan nama file berdasarkan filter
    $fileName = 'hasil_spk_bonus_karyawan_';
    if ($printAll) {
        $fileName .= 'semua_data_';
    } elseif ($bulan && $tahun) {
        $namaBulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $fileName .= strtolower($namaBulan[$bulan]) . '_' . $tahun . '_';
    } elseif ($tahun) {
        $fileName .= 'tahun_' . $tahun . '_';
    }
    $fileName .= date('Y-m-d_H-i-s') . '.pdf';

    // Load view PDF dengan data yang sama seperti halaman web
    $pdf = Pdf::loadView('admin.admin-hasilspk-pdf', [
        'results' => $results,
        'departemenList' => $departemenList,
        'filterInfo' => [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'printAll' => $printAll
        ]
    ]);

    // Set orientasi landscape untuk tabel yang lebar
    $pdf->setPaper('A4', 'landscape');

    // Return PDF untuk diunduh
    return $pdf->download($fileName);
 }

}
