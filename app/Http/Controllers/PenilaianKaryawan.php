<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Outlet;
use App\Models\Divisi;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\PenilaianKaryawanModel;

class PenilaianKaryawan extends Controller
{
    public function index($id)
{
    $karyawan = Karyawan::with(['divisi', 'absensi', 'penilaian'])->find($id);

    if (!$karyawan) {
        return redirect()->route('admin-penilaian.index')->withErrors('Karyawan tidak ditemukan.');
    }

    // Get the latest attendance record for this employee
    $absensi = Absensi::where('data_karyawan_id', $id)
                     ->orderBy('created_at', 'desc')
                     ->first();

    $departemenList = Departemen::all();
    $outletList = Outlet::all();
    $divisi = $karyawan->divisi;
    $kpiList = $divisi ? $divisi->kpi : [];

    return view("admin.edit-penilaiankaryawan", compact(
        "karyawan",
        "departemenList", 
        "outletList", 
        "divisi", 
        "kpiList",
        "absensi"
    ));
}


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
        // Check if assessment already exists
        $existing = PenilaianKaryawanModel::where('karyawan_id', $validatedData['karyawan_id'])->first();
        
        if ($existing) {
            $existing->update($validatedData);
            $message = 'Penilaian karyawan berhasil diperbarui.';
        } else {
            PenilaianKaryawanModel::create($validatedData);
            $message = 'Penilaian karyawan berhasil disimpan.';
        }

        return redirect()->route('admin-penilaian.index')
                       ->with('success', $message);
    } catch (\Exception $e) {
        \Log::error('Error saving Penilaian Karyawan: ' . $e->getMessage());
        return redirect()->back()
                       ->withInput()
                       ->withErrors('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
}

}
