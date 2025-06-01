<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surveyor;
use App\Models\ObservasiKunjungan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokumentasi;



class ObervasiContoller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $surveyor = $user->surveyor; // Ambil relasi surveyor dari user

        $observasi = ObservasiKunjungan::where('surveyor_id', $surveyor->id)->get();

        return view('user.observasi.index', compact('observasi'));
    }

    public function create()
    {
        $user = Auth::user();
        $surveyor = Surveyor::where('user_id', $user->id)->first();

        return view('user.observasi.create', compact('surveyor'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'surveyor_id' => 'required|exists:surveyors,id',
            'tanggal_kunjungan' => 'required|date',
            'nama_tetangga' => 'required|string',
            'alamat' => 'required|string',
            'kondisi_teramati' => 'required|string',
            'bentuk_interaksi' => 'required|string',
            'catatan_tambahan' => 'required|string',

        ]);


        $observasi = ObservasiKunjungan::create($validated);
        // dd($observasi);

        return redirect()->route('observasi.index')->with('success', 'Observasi Kunjungan berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([]);
        ObservasiKunjungan::create($request->save());
    }

    public function showForm($id)
    {
        $observasi = ObservasiKunjungan::findOrfail($id);
        $photos = Dokumentasi::where('observasikunjungan_id', $observasi->id)->get();
        return view('user.observasi.unggah_file', compact('observasi', 'photos'));
    }

    public function uploadPhoto(Request $request, $id)
    {
        $request->validate([
            'observasikunjungan_id' => 'required|exists:observasi_kunjungans,id',
            'photo' => 'required|file|mimetypes:application/pdf,image/jpeg|max:2048',

        ]);

        if (!ObservasiKunjungan::find($id)) {
            return back()->withErrors(['error' => 'ID Observasi Kunjungan tidak ditemukan']);
        }

        $path = $request->file('photo')->store('dokumentasi', 'public');
        $url = Storage::url($path);

        Dokumentasi::create([
            'observasikunjungan_id' => $id,
            'file_path' => $url,
        ]);

        return back()->with('success', 'Foto berhasil diupload!')->with('url', $url);
    }
    public function destroy($id) {}
}
