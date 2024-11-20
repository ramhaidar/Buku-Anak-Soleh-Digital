<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle ( Request $request, Closure $next ) : Response
    {
        if ( auth ()->check () && auth ()->user ()->role === 'Teacher' )
        {
            return $next ( $request );
        }

        return redirect ()->route ( 'dashboard.index' );
        // return redirect ( '/' )->with ( 'error', 'Access denied.' );
    }

}
