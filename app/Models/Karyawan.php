<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan'; // Nama tabel di database
    
    // Field yang akan digunakan
    protected $fillable = ['id', 'nama', 'divisi'];
    
    // public function index()
    // {
    //     // Ambil data ID Karyawan, Nama, dan Divisi dari absensi
    //     $dataKaryawan = Absensi::with('karyawan')
    //                            ->select('id_karyawan', 'jumlah_hadir')
    //                            ->get();

    //     return view('penilaian-kpi', compact('dataKaryawan'));
    // }
}
