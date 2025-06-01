<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurvey;

class KategoriSurveyController extends Controller
{
    public function index()
    {
        $kategori = KategoriSurvey::all();
        return view('kategori_survey.index', compact('kategori'));
    }
}
