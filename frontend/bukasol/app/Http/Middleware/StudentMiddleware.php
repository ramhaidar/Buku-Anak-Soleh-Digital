<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle ( Request $request, Closure $next ) : Response
    {
        if ( auth ()->check () && auth ()->user ()->role === 'Student' )
        {
            return $next ( $request );
        }

        return redirect ()->route ( 'dashboard.index' );
        // return redirect ( '/' )->with ( 'error', 'Access denied.' );
    }
}
