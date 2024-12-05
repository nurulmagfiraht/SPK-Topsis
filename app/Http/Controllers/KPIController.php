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
    public function index($divisiId)
    {
        $kpiList = KPI::where('divisi_id', $divisiId)->paginate(10);
        $divisiList = Divisi::all();
        $departemenList = Departemen::all();
        $divisi = Divisi::find($divisiId);
        $departemen = $divisi ? $divisi->departemen : null;

        return view('admin.admin-showdivisi', compact('kpiList', 'divisiList', 'departemenList', 'divisi', 'departemen'));
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
            'departemen_id' => 'required|integer',
            'divisi_id' => 'required|integer',
        ]);

        KPI::create($validatedData);

        return redirect()->route('admin-showdivisi.show', [$validatedData['departemen_id'], $validatedData['divisi_id']])->with('status', 'KPI baru berhasil ditambahkan.');
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
            'departemen_id' => 'required|integer',
            'divisi_id' => 'required|integer',
        ]);

        $kpi = KPI::findOrFail($id);
        $kpi->update($validatedData);

        return redirect()->route('admin-showdivisi.show', [$validatedData['departemen_id'], $validatedData['divisi_id']])->with('status', 'KPI berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kpi = KPI::findOrFail($id);
        $departemenId = $kpi->divisi->departemen_id;
        $kpi->delete();
        return redirect()->route('admin-showdivisi.show', [$departemenId, $kpi->divisi_id])->with('status', 'KPI berhasil dihapus.');
    }
}
