<?php

// app/Http/Controllers/EvaluasiController.php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluasiController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with(['evaluasis.user'])->findOrFail($id);

        return view('kegiatan.index', compact('kegiatan'));
    }
    public function store(Request $request, $kegiatanId)
    {
        $request->validate([
            'isi_evaluasi' => 'required|string|max:1000',
        ]);

        $kegiatan = Kegiatan::findOrFail($kegiatanId);

        Evaluasi::create([
            'kegiatan_id' => $kegiatan->id,
            'user_id' => Auth::id(),
            'role' => Auth::user()->role,
            'isi_evaluasi' => $request->isi_evaluasi,
        ]);

        return back()->with('success', 'Evaluasi berhasil ditambahkan.');
    }
}
