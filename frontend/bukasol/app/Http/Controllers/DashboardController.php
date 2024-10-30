<?php

namespace App\Http\Controllers;

use Livewire\Livewire;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function index ()
    {
        $token = Cookie::get ( 'token' );
        $role  = Cookie::get ( 'role' );
        $name  = Cookie::get ( 'name' );

        return app ( Dashboard::class)
            ->renderFromController (
                $token,
                $role,
                $name
            );
    }
}
