<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surveyor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokumentasi;
use App\Models\Kondisi;
use App\Models\Observasi;
use App\Models\ObservasiKondisi;
use Illuminate\Support\Facades\DB;

class ObservasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $surveyor = $user->surveyor;

        $observasis = Observasi::with('kondisi')
            ->where('surveyor_id', $surveyor->id)
            ->get()
            ->map(function ($observasi) {
                // Ambil nama-nama kondisi jadi satu string, misal dipisah koma
                $observasi->nama_kondisis = $observasi->kondisi->pluck('nama')->implode(', ');
                return $observasi;
            });

        return view('user.observasi.index', compact('observasis'));
    }


    public function create()
    {
        $user = Auth::user();
        $kondisis = Kondisi::all();
        $surveyor = Surveyor::where('user_id', $user->id)->first();

        return view('user.observasi.create', compact('surveyor', 'kondisis'));
    }


    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'surveyor_id' => 'required|exists:surveyors,id',
            'tanggal_kunjungan' => 'required|date',
            'nama_tetangga' => 'required|string',
            'alamat' => 'required|string',
            'bentuk_interaksi' => 'required|string',
            'catatan_tambahan' => 'nullable|string',
            'kondisi_teramati' => 'required|array',
            'kondisi_teramati.*' => 'exists:kondisis,id',
            'nilai_kondisi' => 'required|array',
            'nilai_kondisi.*' => 'nullable|numeric|min:0|max:100',
        ]);

        // Simpan ke tabel observasis
        $observasi = Observasi::create([
            'surveyor_id' => $validated['surveyor_id'],
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'nama_tetangga' => $validated['nama_tetangga'],
            'alamat' => $validated['alamat'],
            'bentuk_interaksi' => $validated['bentuk_interaksi'],
            'catatan_tambahan' => $validated['catatan_tambahan'] ?? null,
        ]);

        // Simpan kondisi terkait ke tabel observasi_kondisis
        foreach ($validated['kondisi_teramati'] as $index => $kondisi_id) {
            $nilai = $validated['nilai_kondisi'][$index] ?? null;

            ObservasiKondisi::create([
                'observasi_id' => $observasi->id,
                'kondisi_id' => $kondisi_id,
                'nilai' => $nilai,
            ]);
        }

        return redirect()->route('observasi.index')->with('success', 'Observasi berhasil disimpan.');
    }


    public function showForm($id)
    {
        $observasi = Observasi::findOrfail($id);
        $photos = Dokumentasi::where('observasi_id', $observasi->id)->get();
        return view('user.observasi.unggah_file', compact('observasi', 'photos'));
    }

    public function uploadPhoto(Request $request, $id)
    {
        $request->validate([
            'observasi_id' => 'required|exists:observasis,id',
            'photo' => 'required|file|mimetypes:application/pdf,image/jpeg|max:1048',

        ]);

        if (!Observasi::find($id)) {
            return back()->withErrors(['error' => 'ID Observasi Kunjungan tidak ditemukan']);
        }

        $path = $request->file('photo')->store('dokumentasi', 'public');
        // $url = url($path);

        Dokumentasi::create([
            'observasi_id' => $id,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Foto berhasil diupload!');
    }

    public function destroyPhoto($id)
    {

        $photo = Dokumentasi::where('id', $id)->first();

        if (!$photo) {
            return back()->with('error', 'Foto tidak ditemukan.');
        }

        if (Storage::disk('public')->exists($photo->file_path)) {
            Storage::disk('public')->delete($photo->file_path);
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }


    public function edit($id)
    {
        $observasi = Observasi::findOrfail($id);
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

        $observasi = Observasi::find($id);

        if (!$observasi) {
            return back()->withErrors(['error' => 'ID Observasi Kunjungan tidak ditemukan']);
        }

        $observasi->update($update);
        return redirect()->route('observasi.index')->with('success', 'Data Berhasil di perbaharui');
    }
    public function destroy($id)
    {
        $observasi = Observasi::findOrfail($id);

        // dd($observasi);
        $observasi->destroy($id);
        return redirect()->route('observasi.index')->with('success', 'Data berhasil di hapus');
    }
    public function getData()
    {
        $observasi = Observasi::with('surveyor')->get();
        return view('admin.observasi.index', compact('observasi'));
    }
    public function getDetail($id)
    {
        $observasi = Observasi::with('dokumentasi')->findOrFail($id);
        return view('admin.observasi.details', compact('observasi'));
    }



    public function hasilObservasi()
    {
        $hasil = Kondisi::with('observasi')->get()->map(function ($kondisi) {
            return [
                'id' => $kondisi->id,
                'nama' => $kondisi->nama,
                'total_nilai' => $kondisi->observasi->sum(fn($obs) => $obs->pivot->nilai),
                'jumlah_responden' => $kondisi->observasi->count(),
            ];
        });

        return view('admin.observasi.hasil', ['hasil' => $hasil]);
    }

    public function grafik()
    {
        $data = DB::table('observasi_kondisis')
            ->join('kondisis', 'observasi_kondisis.kondisi_id', '=', 'kondisis.id')
            ->select('kondisis.nama', DB::raw('SUM(observasi_kondisis.nilai) as total_nilai'))
            ->groupBy('kondisis.id', 'kondisis.nama')
            ->get();

        return view('admin.observasi.grafik', [
            'dataKondisi' => $data,
        ]);
    }

    public function destroyAdmin($id)
    {
        $observasi = Observasi::findOrfail($id);

        // dd($observasi);
        $observasi->destroy($id);
        return redirect()->route('admin.observasi')->with('success', 'Data berhasil di hapus');
    }
    public function showDataTetangga($id)
    {
        $kondisi = Kondisi::with('observasi.dokumentasi')->find($id);
        $observasis = $kondisi->observasi;
        return view('admin.observasi.showTetangga', compact('observasis', 'kondisi'));
    }
}
