<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Outlet;

class PenilaianKPIController extends Controller
{
    public function index()
{
    // Ambil data absensi dan join dengan data karyawan untuk mendapatkan informasi divisi dan outlet
    $dataKaryawan = Absensi::join('data_karyawan', 'absensi.data_karyawan_id', '=', 'data_karyawan.id')
        ->join('divisi', 'data_karyawan.divisi_id', '=', 'divisi.id')
        ->join('outlet', 'data_karyawan.outlet_id', '=', 'outlet.id')
        ->select('absensi.*', 'data_karyawan.nama as nama_karyawan', 'divisi.nama as nama_divisi', 'outlet.nama as nama_outlet')
        ->whereNotNull('data_karyawan_id')
        ->paginate(15);

    $departemenList = Departemen::paginate(15);
    $outletList = Outlet::all();

    return view('admin.admin-penilaian', compact('dataKaryawan', 'departemenList', 'outletList'));
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
