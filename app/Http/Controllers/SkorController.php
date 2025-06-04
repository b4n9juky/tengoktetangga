<?php

namespace App\Http\Controllers;

use App\Models\Skoring;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SkorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $skor = Skoring::all();
        return view('admin.skor.index', compact('skor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nilai_awal' => 'required|integer',
            'nilai_akhir' => 'required|integer|gte:nilai_awal',
            'keterangan' => 'required|string',
            'is_active' => 'required|integer',
        ]);
        Skoring::create($validated);
        return redirect()->route('skor.index')->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Skoring::findOrFail($id);
        return view('admin.skor.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nilai_awal' => 'required|integer',
            'nilai_akhir' => 'required|integer|gte:nilai_awal',
            'keterangan' => 'required|string',
            'is_active' => 'required|integer',
        ]);
        $skor = Skoring::findOrFail($id);
        $skor->update($validated);
        return redirect()->route('skor.index')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skor = Skoring::findOrFail($id);
        $skor->delete();
        return redirect()->route('skor.index')->with('success', 'Data Telah di Hapus');
    }
}
