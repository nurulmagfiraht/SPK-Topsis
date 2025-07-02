<?php

namespace App\Http\Controllers;

use App\Imports\KaryawanImport;
use App\Models\Absensi;
use App\Models\Divisi;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Absensi::query();
        $departemenList = Departemen::all();

        // Filtering berdasarkan divisi_id
        if ($request->has('divisi_id') && $request->divisi_id != '') {
            $query->where('divisi_id', $request->divisi_id);
        }

        // Pagination dengan 20 data per halaman
        $dataKaryawan = $query->paginate(20);

        // Ambil semua divisi untuk dropdown filter
        $divisiList = Divisi::all();

        return view('admin.admin-absensi', compact('dataKaryawan', 'divisiList', 'departemenList'));
    }

    /**
     * Import absensi dari file Excel.
     */
    public function import(Request $request)
    {
        $request->validate([
            'absensi_file' => 'required|file|mimes:csv,xls,xlsx|max:2048',
        ]);

        try {
            Excel::import(new KaryawanImport, $request->file('absensi_file'));
            return redirect()->back()->with('success', 'Data absensi berhasil diimpor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat impor: ' . $e->getMessage());
        }
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
