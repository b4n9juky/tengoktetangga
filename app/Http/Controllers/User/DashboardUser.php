<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surveyor;
use App\Models\Answer;
use App\Models\Skoring;

class DashboardUser extends Controller
{
    public function index()
    {

        $user = Auth::user();


        $surveyor = Surveyor::where('user_id', $user->id)->first();


        $hasBiodata = !is_null($surveyor);
        $hasAnswer = false;

        if ($surveyor) {
            $hasAnswer = Answer::where('surveyor_id', $surveyor->id)->exists();
        }


        // mengatur siswa yang skornya tidak memenuhi syarat maka tidak bs lanjut menu observasi




        $answers = Answer::with(['question.tema', 'choices'])
            ->where('surveyor_id', $surveyor->id)
            ->get();

        // Hitung skor total per tema
        $scoresByTema = $answers->groupBy('question.tema.id')->map(function ($group) {
            $totalBobot = 0;

            foreach ($group as $answer) {
                foreach ($answer->choices as $choice) {
                    $totalBobot += $choice->bobot ?? 0;
                }
            }

            return [
                'tema' => $group->first()->question->tema,
                'total_score' => $totalBobot,
            ];
        })->values();

        // Hitung total skor keseluruhan siswa
        $totalSkor = $scoresByTema->sum('total_score');

        // Ambil semua rentang skoring dari DB
        $skorings = Skoring::where('is_active', false)->get();

        // Cek apakah total skor masuk ke dalam salah satu rentang
        $matchSkoring = $skorings->first(function ($skoring) use ($totalSkor) {
            return $totalSkor >= $skoring->nilai_awal && $totalSkor <= $skoring->nilai_akhir;
        });






        return view('user.dashboard', [
            'hasBiodata' => $hasBiodata,
            'hasAnswer' => $hasAnswer,
            'skor' => $matchSkoring,
            'totalSkor' => $totalSkor,
        ]);
    }



    public function cekResponden()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil ID surveyor dari relasi user
        $surveyorId = $user->surveyor->id ?? null;

        if (!$surveyorId) {
            // Jika user tidak punya relasi ke surveyor, redirect atau beri pesan error
            return redirect()->route('dashboard.user')->with('error', 'Data surveyor tidak ditemukan.');
        }

        // Ambil semua jawaban surveyor dengan relasi tema dan choices
        $answers = Answer::with(['question.tema', 'choices'])
            ->where('surveyor_id', $surveyorId)
            ->get();

        // Hitung skor total per tema
        $scoresByTema = $answers->groupBy('question.tema.id')->map(function ($group) {
            $totalBobot = 0;

            foreach ($group as $answer) {
                foreach ($answer->choices as $choice) {
                    $totalBobot += $choice->bobot ?? 0;
                }
            }

            return [
                'tema' => $group->first()->question->tema,
                'total_score' => $totalBobot,
            ];
        })->values();

        // Hitung total skor keseluruhan siswa
        $totalSkor = $scoresByTema->sum('total_score');

        // Ambil semua rentang skoring dari DB
        $skorings = Skoring::all();

        // Cek apakah total skor masuk ke dalam salah satu rentang
        $matchSkoring = $skorings->first(function ($skoring) use ($totalSkor) {
            return $totalSkor >= $skoring->min && $totalSkor <= $skoring->max;
        });

        // Jika ditemukan rentang skoring yang sesuai, arahkan ke observasi
        if ($matchSkoring) {
            return redirect()->route('observasi');
        }

        // Jika tidak ada yang cocok, arahkan ke dashboard
        return redirect()->route('dashboard.user');
    }
}
