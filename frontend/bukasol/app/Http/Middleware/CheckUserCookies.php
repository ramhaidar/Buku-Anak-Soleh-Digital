<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CheckUserCookies
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle ( Request $request, Closure $next ) : Response
    {
        $token = Cookie::get ( 'token' );
        $role  = Cookie::get ( 'role' );
        $name  = Cookie::get ( 'name' );

        if ( ! $token || ! $role || ! $name )
        {
            return redirect ()->route ( 'login.index' );
        }

        return $next ( $request );
    }
}
