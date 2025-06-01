<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cek apakah role user ada dalam daftar role yang diperbolehkan
        // if (!in_array($user->role, $roles)) {
        //     return redirect('/')->with('error', 'Anda tidak memiliki akses.');
        // }


        if (!in_array($user->role->value, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
