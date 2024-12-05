<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\Departemen;
use Illuminate\Support\Facades\Log;

class KPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpi = KPI::paginate(10);
        $divisiList = Divisi::all();
        $departemenList = Departemen::all();

        return view('admin.admin-showdivisi', compact('kpi', 'divisiList', 'departemenList'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-showdivisi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'simbol' => 'required|string',
            'kriteria' => 'required|string',
            'bobot' => 'required|integer',
            'atribut' => 'nullable|string',
            'departemen_id' => 'nullable|integer',
            'divisi_id' => 'required|integer',
        ]);

        KPI::create($validatedData);

        return view('admin.admin-showdivisi')->with('status', 'KPI baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kpi = KPI::findOrFail($id);
        return view('admin.admin-showdivisi', compact('kpi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kpi = KPI::findOrFail($id);
        return view('admin.admin-showdivisi', compact('kpi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'simbol' => 'required|string',
            'kriteria' => 'required|string',
            'bobot' => 'required|integer',
            'atribut' => 'required|string',
            'departemen_id' => 'required|integer',
            'divisi_id' => 'required|integer',
        ]);

        $kpi = KPI::findOrFail($id);
        $kpi->update($validatedData);

        return view('admin.admin-showdivisi')->with('status', 'KPI berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kpi = KPI::findOrFail($id);
        $kpi->delete();

        return view('admin.admin-showdivisi')->with('status', 'KPI berhasil dihapus.');
    }
}
