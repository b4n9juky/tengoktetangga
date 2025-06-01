<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\BentukKegiatan;
use App\Models\TimKegiatan;
use App\Models\AnggotaTimKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        $kegiatan = Kegiatan::all();

        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        $bentuk = BentukKegiatan::all();
        return view('kegiatan.create', compact('bentuk'));
    }

    public function bentukKegiatan()
    {
        $bentuk = BentukKegiatan::all();
        return view('kegiatan.bentuk_kegiatan', compact('bentuk'));
    }

    public function simpanbentukKegiatan(Request $request)
    {
        $validated = $request->validate([
            'nama_bentuk' => 'required|string',
            'deskripsi' => 'required'

        ]);

        $validated['created_by'] = Auth::id();

        BentukKegiatan::create($validated);

        return redirect()->route('kegiatan.home')->with('success', 'Kegiatan berhasil dibuat');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'bentuk_id' => 'required|exists:bentuk_kegiatans,id',
        ]);

        $validated['dibuat_oleh'] = Auth::id();

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.home')->with('success', 'Kegiatan berhasil dibuat');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::with('timKegiatan', 'timKegiatan.anggotaTimKegiatan')->findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $bentuk = BentukKegiatan::all();
        return view('kegiatan.edit', compact('kegiatan', 'bentuk'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.home')->with('success', 'Kegiatan diperbarui');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.home')->with('success', 'Kegiatan dihapus');
    }

    public function approveByPembina($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->pembina_id = Auth::id();
        $kegiatan->save();

        return redirect()->route('kegiatan.home')->with('success', 'Disetujui Pembina');
    }

    public function approveByKoordinator($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->koordinator_id = Auth::id();
        $kegiatan->status = 'disetujui_koordinator';
        $kegiatan->save();

        return redirect()->route('kegiatan.home')->with('success', 'Disetujui Koordinator');
    }

    public function tambahTim($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $users = \App\Models\User::where('role', 'pelaksana')->get();
        return view('kegiatan.tim', compact('kegiatan', 'users'));
    }

    public function storeTim(Request $request, $id)
    {
        $request->validate([
            'nama_tim' => 'required',
            'ketua_id' => 'required|exists:users,id',
        ]);

        TimKegiatan::create([
            'kegiatan_id' => $id,
            'nama_tim' => $request->nama_tim,
            'ketua_id' => $request->ketua_id,
        ]);

        return redirect()->route('kegiatan.show', $id)->with('success', 'Tim kegiatan ditambahkan');
    }

    public function tambahAnggotaTim($tim_id)
    {
        $tim = TimKegiatan::findOrFail($tim_id);
        $users = \App\Models\User::where('role', 'pelaksana')->get();
        return view('kegiatan.anggota_tim', compact('tim', 'users'));
    }

    public function storeAnggotaTim(Request $request, $tim_id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tugas' => 'nullable|string'
        ]);

        AnggotaTimKegiatan::create([
            'tim_kegiatan_id' => $tim_id,
            'user_id' => $request->user_id,
            'tugas' => $request->tugas,
        ]);

        return redirect()->back()->with('success', 'Anggota tim ditambahkan');
    }
}
