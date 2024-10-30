<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Dashboard extends Component
{
    private $token, $role, $name;

    public function mount ()
    {
        $this->token = Cookie::get ( 'token' );
        $this->role  = Cookie::get ( 'role' );
        $this->name  = Cookie::get ( 'name' );
    }

    public function renderFromController ( $token, $role, $name )
    {
        $this->token = $token;
        $this->role  = $role;
        $this->name  = $name;

        return $this->render ();
    }

    public function render ()
    {
        return view ( 'livewire.dashboard', [ 
            'token' => $this->token,
            'role'  => $this->role,
            'name'  => $this->name,
        ] );
    }
}
