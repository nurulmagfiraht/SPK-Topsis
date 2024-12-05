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
        // Ambil data ID Karyawan, Nama, dan Divisi dari absensi melalui relasi dengan model Karyawan
        // Contoh query dengan eager loading
        $dataKaryawan = Absensi::with('outlet')->paginate(15);
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
