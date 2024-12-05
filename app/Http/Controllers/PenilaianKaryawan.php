<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Outlet;
use App\Models\Divisi;
use App\Models\PenilaianKaryawanModel;
use Illuminate\Support\Facades\Log;

class PenilaianKaryawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $karyawan = Absensi::find($id);
        $departemenList = Departemen::all();
        $outletList = Outlet::all();
        $divisi = $karyawan->divisi;
        $kpiList = $divisi->kpi;

        return view ("admin.edit-penilaiankaryawan", compact("karyawan", "departemenList", "outletList", "divisi", "kpiList"));

        
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
        $validatedData = $request->validate([
            'karyawan_id' => 'required|exists:data_karyawan,id',
            'c1' => 'required|integer|min:0',
            'c2' => 'required|integer|min:0',
            'c3' => 'required|integer|min:0',
            'c4' => 'required|integer|min:0',
            'c5' => 'required|integer|min:0',
            'c6' => 'required|integer|min:0',
            'c7' => 'required|integer|min:0',
            'c8' => 'required|integer|min:0',
            'c9' => 'required|integer|min:0',
            'c10' => 'required|integer|min:0',
        ]);

        try {
            PenilaianKaryawanModel::create($validatedData);
            return redirect()->route('admin-penilaian.index')->with('success', 'Penilaian karyawan berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Error saving Penilaian Karyawan: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
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
