<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Dashboard extends Component
{
    private $token, $role, $name;
    public $page;

    protected $listeners = [ 'BroadcastCurrentPageTitle' => 'ChangeCurrentPageTitle' ];

    public function mount ()
    {
        $this->token = Cookie::get ( 'token' );
        $this->role  = Cookie::get ( 'role' );
        $this->name  = Cookie::get ( 'name' );
        $this->page  = "Error A";
    }

    public function test ()
    {
        $this->dispatch ( 'XXX', );
    }

    public function ChangeCurrentPageTitle ( $title )
    {
        $this->page = $title;
    }

    public function renderFromController ( $token, $role, $name )
    {
        $this->token = $token;
        $this->role  = $role;
        $this->name  = $name;

        $this->mount ();

        return $this->render ();
    }

    public function render ()
    {
        $this->mount ();

        return view ( 'livewire.dashboard', [ 
            'token' => $this->token,
            'role'  => $this->role,
            'name'  => $this->name,
            'page'  => $this->page,
        ] );
    }
}
