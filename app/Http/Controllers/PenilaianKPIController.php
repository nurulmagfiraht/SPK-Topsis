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
    // Ambil data karyawan yang memiliki absensi
    $dataKaryawan = Absensi::with(['dataKaryawan.divisi', 'dataKaryawan.outlet'])
        ->whereHas('dataKaryawan', function($query) {
            $query->whereNotNull('outlet_id');
        })
        ->whereNotNull('data_karyawan_id')
        ->paginate(15); // Panggil paginate di sini, bukan setelah get()

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
