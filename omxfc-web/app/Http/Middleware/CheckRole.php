<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; // Diese Zeile ändern

class CheckRole
{
    protected $roleHierarchy = [
        'vorstand' => ['vorstand', 'mitglied', 'anwaerter'],
        'mitglied' => ['mitglied'],
        'anwaerter' => []
    ];

    public function handle(Request $request, Closure $next, string $role): Response // Diese Zeile ändern
    {
        if (!$request->user()) {
            abort(403, 'Nicht authentifiziert.');
        }

        $userRole = $request->user()->rolle;

        if (!isset($this->roleHierarchy[$userRole]) || !in_array($role, $this->roleHierarchy[$userRole])) {
            abort(403, 'Keine Berechtigung für diese Aktion.');
        }

        return $next($request);
    }
}