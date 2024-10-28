<?php

namespace App\Http\Controllers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index ()
    {
        $token = Cookie::get ( 'token' );
        $role  = Cookie::get ( 'role' );
        $name  = Cookie::get ( 'name' );

        $data = [ 
            'token' => $token,
            'role'  => $role,
            'name'  => $name
        ];

        // Use Livewire::mount to render the component with data
        $componentHtml = Livewire::mount ( 'dashboard', $data );

        // Return the component's rendered HTML directly as the response
        return response ()->make ( $componentHtml );

        if ( $token && $role )
        {
            return view ( 'livewire.dashboard', [ 
                'token' => $token,
                'role'  => $role,
                'name'  => $name
            ] );
        }

        // return redirect ()->route ( 'login.index' );
    }
}
