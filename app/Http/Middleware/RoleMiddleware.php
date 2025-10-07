<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('Loginform')
                             ->withErrors(['auth' => 'You must be logged in to access this page.']);
        }

        if (Auth::user()->role !== $role) {
            Auth::logout();
            return redirect()->route('Loginform')
                             ->withErrors(['auth' => 'You do not have permission to access this page.']);
        }

        return $next($request);
    }
}
