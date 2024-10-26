<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index ()
    {
        $token = Cookie::get ( 'token' );
        $role  = Cookie::get ( 'role' );
        $name  = Cookie::get ( 'name' );

        if ( $token && $role )
        {
            return view ( 'dashboard', [ 
                'token' => $token,
                'role'  => $role,
                'name'  => $name
            ] );
        }

        return redirect ()->route ( 'login.index' );
    }
}
