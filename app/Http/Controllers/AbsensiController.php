<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanImport;
use App\Models\Absensi;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

// $dataKaryawan = AbsensiController::all();
class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Absensi::query();

        // Filtering berdasarkan divisi_id
        if ($request->has('divisi_id') && $request->divisi_id != '') {
            $query->where('divisi_id', $request->divisi_id);
        }

        // Pagination dengan 15 data per halaman
        $dataKaryawan = $query->paginate(20);

        // Ambil semua divisi untuk dropdown filter
        $divisiList = Divisi::all();

        return view('admin.admin-absensi', compact('dataKaryawan', 'divisiList'));
    }
    
    public function import(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|file|mimes:csv,xls,xlsx|max:2048',
        // ]);

        Excel::import(new KaryawanImport, $request->file('absensi_file'));
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
