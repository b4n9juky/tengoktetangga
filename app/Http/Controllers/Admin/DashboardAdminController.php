<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Surveyor;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $jumlahPengguna = User::count(); // Hitung semua user
        $jumlahPertanyaan = Question::count();
        $jumlahResponden = Surveyor::count();
        return view('dashboard', compact(
            'jumlahPengguna',
            'jumlahPertanyaan',
            'jumlahResponden'
        ));
    }
}
