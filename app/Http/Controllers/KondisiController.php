<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kondisi = Kondisi::all();
        return view('admin.kondisi.index', compact('kondisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kondisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
        ]);
        Kondisi::create($validated);
        return redirect()->route('kondisi.index')->with('success', 'Data Berhasil ditambah');
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
        $kondisi = Kondisi::findOrFail($id);
        return view('admin.kondisi.edit', compact('kondisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kondisi = Kondisi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string',
        ]);

        $kondisi->update($validated);

        return redirect()->route('kondisi.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kondisi = Kondisi::findOrFail($id);
        $kondisi->delete();
        return redirect()->route('kondisi.index')->with('Success', 'Data Berhasil di Hapus');
    }
}
