<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Navbar extends Component
{
    private $token, $role, $name;

    public function mount ()
    {
        $this->token = Cookie::get ( 'token' );
        $this->role  = Cookie::get ( 'role' );
        $this->name  = Cookie::get ( 'name' );
    }

    public function showTeacherTable ()
    {
        $this->dispatch ( 'loadTeacherTable' );
    }

    public function render ()
    {
        $this->mount ();
        return view ( 'livewire.partials.navbar', [ 
            'token' => $this->token,
            'role'  => $this->role,
            'name'  => $this->name
        ] );
    }
}
