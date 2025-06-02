<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\TemaKuisioner;

class TemaKuisionerController extends Controller
{
    public function index()
    {
        $tema = TemaKuisioner::all();
        return view('admin.tema_kuisioner.index', compact('tema'));
    }
    public function create()
    {
        return view('admin.tema_kuisioner.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_tema' => 'required|string',
            'deskripsi' => 'required|string',
        ]);
        TemaKuisioner::create($data);
        return redirect()->route('tema')->with('success', 'Tema baru berhasil ditambahkan');
    }
    public function edit($id)
    {
        $tema = TemaKuisioner::all()->findOrFail($id);
        return view('admin.tema_kuisioner.edit', compact('tema'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'nama_tema' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $tema = TemaKuisioner::findOrFail($id); // Ambil data berdasarkan ID

        $tema->update($data); // Update data

        return redirect()->route('tema')->with('success', 'Tema Kuisioner berhasil diperbaharui');
    }
    public function destroy($id)
    {
        TemaKuisioner::destroy($id);
        return redirect()->route('tema')->with('success', 'Tema Kuisioner Berhasil di hapus');
    }
    public function showQuestions($id)
    {

        $q = Question::with('choices')
            ->where('tema_id', $id)
            ->get();
        return view('admin.tema_kuisioner.show', compact('q'));
    }
    public function showDetails($id)
    {
        $pertanyaan = Question::with(['choices' => function ($query) {
            $query->withCount('answers');
        }])->findOrFail($id);
        return view('admin.tema_kuisioner.showDetails', compact('pertanyaan'));
    }
}
