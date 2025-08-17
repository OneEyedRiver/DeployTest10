<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (!Auth::user()->is_admin) {
           abort(403, 'Unauthorized');
           //return redirect('/');
        }

        return $next($request);
    }
}
