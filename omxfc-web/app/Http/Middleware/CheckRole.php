<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->rolle == $role) {
            // Benutzer hat die angeforderte Rolle
            return $next($request);
        }

        // Benutzer hat nicht die angeforderte Rolle
        Auth::logout(); // Logout the user

        Session::flash('error', 'Dein Mitgliedsantrag wird aktuell noch geprüft. Wir melden uns in Kürze bei dir.'); // Use Session::flash
        return redirect('login');
    }
}