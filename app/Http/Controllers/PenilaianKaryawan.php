<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Outlet;
use App\Models\Divisi;


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
            'karyawan_id' => 'required|exists:karyawan,id',
            'kriteria1' => 'required|integer|min:0',
            'kriteria2' => 'required|integer|min:0',
            'kriteria3' => 'required|integer|min:0',
            'kriteria4' => 'required|integer|min:0',
            'kriteria5' => 'required|integer|min:0',
            'kriteria6' => 'required|integer|min:0',
            'kriteria7' => 'required|integer|min:0',
            'kriteria8' => 'required|integer|min:0',
            'kriteria9' => 'required|integer|min:0',
            'kriteria10' => 'required|integer|min:0',
        ]);

        PenilaianKaryawan::create($validatedData);

        return redirect()->route('admin-penilaian.index')->with('success', 'Penilaian karyawan berhasil disimpan.');
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
