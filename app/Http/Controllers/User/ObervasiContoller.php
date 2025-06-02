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
            'catatan_tambahan' => 'nullable|string',

        ]);


        $observasi = ObservasiKunjungan::create($validated);
        // dd($observasi);

        return redirect()->route('observasi.index')->with('success', 'Observasi Kunjungan berhasil disimpan.');
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
    public function edit($id)
    {
        $observasi = ObservasiKunjungan::findOrfail($id);
        return view('user.observasi.edit', compact('observasi'));
    }
    public function update(Request $request, $id)
    {

        // dd('it works');
        $update = $request->validate([
            'surveyor_id' => 'required|exists:surveyors,id',
            'tanggal_kunjungan' => 'required|date',
            'nama_tetangga' => 'required|string',
            'alamat' => 'required|string',
            'kondisi_teramati' => 'required|string',
            'bentuk_interaksi' => 'required|string',
            'catatan_tambahan' => 'nullable|string',


        ]);

        $observasi = ObservasiKunjungan::find($id);

        if (!$observasi) {
            return back()->withErrors(['error' => 'ID Observasi Kunjungan tidak ditemukan']);
        }

        $observasi->update($update);
        return redirect()->route('observasi.index')->with('success', 'Data Berhasil di perbaharui');
    }
    public function destroy($id)
    {
        $observasi = ObservasiKunjungan::findOrfail($id);

        // dd($observasi);
        $observasi->destroy($id);
        return redirect()->route('observasi.index')->with('success', 'Data berhasil di hapus');
    }
    public function getData()
    {
        $observasi = ObservasiKunjungan::with('surveyor')->get();
        return view('admin.observasi.index', compact('observasi'));
    }
    public function getDetail($id)
    {
        $observasi = ObservasiKunjungan::with('dokumentasis')->findOrFail($id);
        return view('admin.observasi.details', compact('observasi'));
    }
}
