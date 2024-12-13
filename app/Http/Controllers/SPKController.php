<?php

namespace App\Http\Controllers;

use App\Models\PenilaianKaryawanModel;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Departemen;

class SPKController extends Controller
{
    public function index()
    {
        $penilaianKaryawan = PenilaianKaryawanModel::with(['karyawan.divisi', 'karyawan.outlet'])->get();
        $departemenList = Departemen::all();
    
        if ($penilaianKaryawan->isEmpty()) {
            return view('admin.admin-hasilspk', [
                'results' => [],
                'departemenList' => $departemenList
            ]);
        }

        $results = [];
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
                'c9' => $nilai->c9,
                'c10' => $nilai->c10,
            ];

            $results[] = [
                'nama' => $nilai->karyawan->nama,
                'divisi' => $nilai->karyawan->divisi->nama ?? 'N/A',
                'outlet' => $nilai->karyawan->outlet->nama ?? 'N/A',
                'nilai' => $nilaiArray,
                'total_nilai' => array_sum($nilaiArray),
                'mendapat_bonus' => array_sum($nilaiArray) >= 60
            ];
        }

        // Sort by total nilai (descending)
        usort($results, function($a, $b) {
            return $b['total_nilai'] - $a['total_nilai'];
        });

        return view('admin.admin-hasilspk', [
            'results' => $results,
            'departemenList' => $departemenList
        ]);
    }

    private function normalizeMatrix($matrix)
    {
        $sumSquared = [
            'c1' => 0,
            'c2' => 0,
            'c3' => 0,
            'c4' => 0,
            'c5' => 0,
            'c6' => 0,
            'c7' => 0,
            'c8' => 0,
            'c9' => 0,
            'c10' => 0
        ];

        // Menghitung jumlah kuadrat
        foreach ($matrix as $row) {
            foreach ($row['nilai'] as $criteria => $value) {
                $sumSquared[$criteria] += pow($value, 2);
            }
        }

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
            foreach ($row['nilai'] as $criteria => $value) {
                $weightedRow[$criteria] = $value * $weights[$criteria];
            }
            $weighted[] = $weightedRow;
        }

        return $weighted;
    }

    private function findIdealSolutions($weightedMatrix)
    {
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
