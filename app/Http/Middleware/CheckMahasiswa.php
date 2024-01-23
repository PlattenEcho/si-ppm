<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMahasiswa
{
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->idrole === 3) {
            return $next($request);
        }

        return redirect('/404')->with('error', 'Unauthorized');
    }
}
