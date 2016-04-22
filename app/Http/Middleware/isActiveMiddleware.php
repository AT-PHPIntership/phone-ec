<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guest() && Auth::user()->active == 1) {
            return $next($request);
        }

        if ($guard == 'admin') {
            return redirect('admin/login');
        }
        else {
            return redirect('login');
        }
    }
}
