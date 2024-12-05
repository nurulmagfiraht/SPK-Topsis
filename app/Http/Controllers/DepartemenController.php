<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemenList = Departemen::all();
        return view('admin.admin-departemen', compact('departemenList'));
    }

    public function show($departemenId)
{
    $departemenList = Departemen::all();
    $departemen = Departemen::findOrFail($departemenId);
    $divisiList = $departemen->divisi()->get();
    
    // Ambil KPI yang berelasi dengan divisi
    $kpiList = $departemen->divisi->flatMap(function ($divisi) {
        return $divisi->kpi;
    });

    return view('admin.admin-showdivisi', compact('departemenList', 'departemen', 'divisiList', 'kpiList'));
}
} 