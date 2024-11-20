<?php

namespace App\Http\Controllers;

use Livewire\Livewire;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    // public function index ()
    // {
    //     $token = Cookie::get ( 'token' );
    //     $role  = Cookie::get ( 'role' );
    //     $name  = Cookie::get ( 'name' );

    //     return app ( Dashboard::class)
    //         ->renderFromController (
    //             $token,
    //             $role,
    //             $name
    //         );
    // }

    public function index ()
    {
        $auth = auth ()->user ();

        if ( $auth->role === "Admin" )
        {
            return redirect ()->route ( 'admin.student-table.index' );
        }
        else if ( $auth->role === "Teacher" )
        {
            return redirect ()->route ( 'teacher.index' );
        }
        else if ( $auth->role === "Student" )
        {
            return redirect ()->route ( 'student.index' );
        }

        $role = $auth->role;
        $name = $auth->name;

        return view ( 'dashboard', [ 
            'role' => $role,
            'name' => $name,
        ] );
    }
}
