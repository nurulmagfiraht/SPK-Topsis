<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Karyawan;
use App\Models\Outlet;
use App\Models\Absensi;
use App\Models\Divisi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $departemenList = Departemen::all();
        $jumlahKaryawan = Karyawan::count();
        $jumlahOutlet = Outlet::count();
        $jumlahAbsensi = Absensi::count();
        $jumlahDivisi = Divisi::count();
        $jumlahDepartemen = Departemen::count();

        return view('admin.admin', compact('departemenList', 'jumlahKaryawan', 'jumlahOutlet', 'jumlahAbsensi', 'jumlahDivisi', 'jumlahDepartemen'));
    }
}