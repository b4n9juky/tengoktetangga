<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Enums\UserRole;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $user = Auth::user();

        return match ($user->role) {
            UserRole::ADMIN => redirect()->route('dashboard.admin'),
            UserRole::PEMBINA  => redirect()->route('dashboard.admin'),
            UserRole::KOORDINATOR  => redirect()->route('dashboard.admin'),
            UserRole::PELAKSANA  => redirect()->route('dashboard.user'),
            default         => redirect('/'),
        };

        // return redirect()->intended(route('dashboard.user', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
