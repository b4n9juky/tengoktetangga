<?php

namespace App\Http\Controllers;

use App\Models\Surveyor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;

class SurveyorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin|siswa');
    // }

    // hitung skor per responden
    public function hitungSkor($respondenId)
    {
        $answers = Answer::with('choices')
            ->where('responden_id', $respondenId)
            ->get();

        $totalSkor = $answers->flatMap(function ($answer) {
            return $answer->choices;
        })->sum('bobot');

        return view('dashboard.skor', compact('totalSkor'));
    }

    // hitung semua skor responden
    public function semuaSkor()
    {
        $responden = Surveyor::with(['answers.choices'])->get();

        $respondenSkor = $responden->map(function ($r) {
            $totalSkor = $r->answers->flatMap(function ($answer) {
                return $answer->choices;
            })->sum('bobot');

            return [
                'nama' => $r->nama,
                'skor' => $totalSkor,
            ];
        });

        return view('dashboard.semua_skor', compact('respondenSkor'));
    }


    public function index()
    {

        $responden = Surveyor::with('answers.choices', 'answers.question.tema')->get();


        return view('admin.surveyor.index', compact('responden'));
    }
    public function create()
    {
        return view('surveyors.biodata');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $user = Auth::user();

        // Cek apakah user sudah pernah mengisi biodata
        if (Surveyor::where('user_id', $user->id)->exists()) {
            return redirect()->route('dashboard.user')
                ->with('error', 'Anda sudah pernah mengisi biodata.');
        }

        // Simpan data biodata surveyor
        Surveyor::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('dashboard.user')
            ->with('success', 'Biodata berhasil disimpan.');
    }
    public function edit()
    {
        $user = Auth::user();
        $surveyor = Surveyor::where('user_id', $user->id)->firstOrFail();

        return view('surveyors.edit-biodata', compact('surveyor'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $user = Auth::user();
        $surveyor = Surveyor::where('user_id', $user->id)->firstOrFail();

        $surveyor->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('dashboard.user')->with('success', 'Biodata berhasil diperbarui.');
    }
    public function destroy($id)
    {
        Answer::where('surveyor_id', $id)->delete();

        return redirect()->route('surveyor.index')->with('success', 'Data berhasil di hapus');
    }
}
