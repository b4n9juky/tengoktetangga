<?php

namespace App\Http\Controllers;

use App\Models\Surveyor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:admin|siswa');
    // }

    public function form()
    {
        return view('surveyors.biodata');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string',
            'kelompok' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $user = Auth::user(); // atau auth()->user()

        Surveyor::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'kelompok' => $request->kelompok,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/dashboard')->with('success', 'Biodata berhasil disimpan.');
    }
}
