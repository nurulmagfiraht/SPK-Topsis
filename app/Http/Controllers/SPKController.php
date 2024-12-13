<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKaryawanModel;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class SPKController extends Controller
{
    public function index()
    {
        // Ambil semua data penilaian karyawan
        $penilaianKaryawan = PenilaianKaryawanModel::with('karyawan')->get();
        
        // Kriteria dan bobot (sesuaikan dengan kebutuhan)
        $kriteria = [
            'quality' => 0.3,        // Bobot kualitas kerja
            'quantity' => 0.2,       // Bobot kuantitas kerja
            'timelineness' => 0.2,   // Bobot ketepatan waktu
            'effectiveness' => 0.15,  // Bobot efektivitas
            'independence' => 0.15    // Bobot kemandirian
        ];

        // 1. Membuat matriks keputusan
        $matriks = [];
        foreach ($penilaianKaryawan as $nilai) {
            $matriks[] = [
                'id_karyawan' => $nilai->id_karyawan,
                'nama' => $nilai->karyawan->nama_karyawan,
                'nilai' => [
                    'quality' => $nilai->quality,
                    'quantity' => $nilai->quantity,
                    'timelineness' => $nilai->timelineness,
                    'effectiveness' => $nilai->effectiveness,
                    'independence' => $nilai->independence
                ]
            ];
        }

        // 2. Normalisasi matriks
        $normalizedMatrix = $this->normalizeMatrix($matriks);

        // 3. Pemberian bobot pada matriks yang telah dinormalisasi
        $weightedMatrix = $this->weightedMatrix($normalizedMatrix, $kriteria);

        // 4. Menentukan solusi ideal positif dan negatif
        $idealSolutions = $this->findIdealSolutions($weightedMatrix);

        // 5. Menghitung jarak ke solusi ideal
        $distances = $this->calculateDistances($weightedMatrix, $idealSolutions);

        // 6. Menghitung nilai preferensi
        $preferences = $this->calculatePreferences($distances);

        // 7. Mengurutkan hasil berdasarkan nilai preferensi (tertinggi ke terendah)
        arsort($preferences);

        // Menyiapkan data untuk view
        $results = [];
        foreach ($preferences as $id => $score) {
            $karyawan = collect($matriks)->firstWhere('id_karyawan', $id);
            $results[] = [
                'id_karyawan' => $id,
                'nama' => $karyawan['nama'],
                'score' => round($score * 100, 2),
                'nilai' => $karyawan['nilai']
            ];
        }

        return view('admin.admin-hasilspk', ['results' => $results]);
    }

    private function normalizeMatrix($matrix)
    {
        $normalized = [];
        $sumSquared = [
            'quality' => 0,
            'quantity' => 0,
            'timelineness' => 0,
            'effectiveness' => 0,
            'independence' => 0
        ];

        // Menghitung jumlah kuadrat
        foreach ($matrix as $row) {
            foreach ($row['nilai'] as $criteria => $value) {
                $sumSquared[$criteria] += pow($value, 2);
            }
        }

        // Normalisasi
        foreach ($matrix as $row) {
            $normalizedRow = ['id_karyawan' => $row['id_karyawan']];
            foreach ($row['nilai'] as $criteria => $value) {
                $normalizedRow[$criteria] = $value / sqrt($sumSquared[$criteria]);
            }
            $normalized[] = $normalizedRow;
        }

        return $normalized;
    }

    private function weightedMatrix($normalizedMatrix, $weights)
    {
        $weighted = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = ['id_karyawan' => $row['id_karyawan']];
            foreach ($weights as $criteria => $weight) {
                $weightedRow[$criteria] = $row[$criteria] * $weight;
            }
            $weighted[] = $weightedRow;
        }
        return $weighted;
    }

    private function findIdealSolutions($weightedMatrix)
    {
        $positive = [];
        $negative = [];

        // Inisialisasi
        foreach (array_keys($weightedMatrix[0]) as $criteria) {
            if ($criteria !== 'id_karyawan') {
                $values = array_column($weightedMatrix, $criteria);
                $positive[$criteria] = max($values);
                $negative[$criteria] = min($values);
            }
        }

        return [
            'positive' => $positive,
            'negative' => $negative
        ];
    }

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
                'positive' => sqrt($positiveDistance),
                'negative' => sqrt($negativeDistance)
            ];
        }
        return $distances;
    }

    private function calculatePreferences($distances)
    {
        $preferences = [];
        foreach ($distances as $id => $distance) {
            $preferences[$id] = $distance['negative'] / ($distance['positive'] + $distance['negative']);
        }
        return $preferences;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
