<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin here
        // Replace the 'isAdmin' condition with your actual admin check logic
        if (auth()->user()->type == 'employee') {
            return $next($request);
        }
        return abort(403, 'Unauthorized action.');


        // return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
}
