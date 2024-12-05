<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemenList = Departemen::all();
        $divisiList = Divisi::all();
        return view('admin.admin-departemen', compact('departemenList', 'divisiList'));
    }

    public function show($departemenId, $divisiId)
    {
        $departemenList = Departemen::all();
        $departemen = Departemen::findOrFail($departemenId);
        $divisi = Divisi::findOrFail($divisiId);
        $divisiList = Divisi::all();
        $kpiList = $divisi->kpi;

        return view('admin.admin-showdivisi', compact('departemenList', 'departemen', 'divisi', 'divisiList', 'kpiList'));
    }
} 