<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle ( Request $request, Closure $next, ...$guards )
    {
        // Check if the user is authenticated
        if ( Auth::check () )
        {
            // Custom redirection logic for unauthenticated users
            return redirect ()->route ( 'dashboard.index' ); // Change 'custom-login' to your desired route name
        }

        return $next ( $request );
    }

}
