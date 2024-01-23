<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckKepalaDiskominfo
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->idrole === 2) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized');
    }
}
