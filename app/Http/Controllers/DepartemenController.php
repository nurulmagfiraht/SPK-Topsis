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
    $departemen = Departemen::findOrFail($departemenId);
    $divisiList = $departemen->divisi; // Asumsikan ada relasi 'divisi' di model Departemen

    return view('admin.admin-departemen', compact('departemen', 'divisiList'));
}
} 