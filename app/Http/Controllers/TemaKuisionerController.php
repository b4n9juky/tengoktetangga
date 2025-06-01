<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemaKuisioner;

class TemaKuisionerController extends Controller
{
    public function index()
    {
        $tema = TemaKuisioner::all();
        return view('tema_kuisioner.index', compact('tema'));
    }
}
