<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!$request->user()) {
            // Handle unauthenticated users
            return redirect()->route('login');
        }
    
        // Check if the user has the "admin" role
        if (!$request->user()->roles()->where('name', 'admin')->exists()) {
            // Redirect the user to an "unauthorized" page or route
            return redirect()->route('unauthorized');
        }
    
        // User has the "admin" role, proceed with the request
        return $next($request);
    }
}
