<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surveyor;
use App\Models\Answer;

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


        return view('user.dashboard', ['hasBiodata' => $hasBiodata, 'hasAnswer' => $hasAnswer]);
    }
}
