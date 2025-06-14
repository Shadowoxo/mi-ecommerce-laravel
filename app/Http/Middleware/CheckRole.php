<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! auth()->check() || auth()->user()->role !== $role) {
            abort(403, 'Acceso no autorizado');
        }
        return $next($request);
    }
}
