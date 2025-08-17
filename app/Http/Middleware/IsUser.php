<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        // Allow only if the user is authenticated and NOT an admin
        if (Auth::check() && !Auth::user()->is_admin) {
            return $next($request);
        }

        // If user is admin or not logged in, block access
        abort(403, 'Unauthorized access');
    }
}
