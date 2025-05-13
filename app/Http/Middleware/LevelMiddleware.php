<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LevelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('gagal', 'You must log in first.');
        }

        // Cek apakah user memiliki role yang sesuai
        $user = Auth::user();
        if ($user->level !== $level) {
            return redirect()->route('login')->with('gagal', 'Cannot access this page.');
        }

        return $next($request);
    }
}
