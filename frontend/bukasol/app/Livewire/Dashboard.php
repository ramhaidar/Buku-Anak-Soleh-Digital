<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Dashboard extends Component
{
    private $token, $role, $name;
    public $page;

    protected $listeners = [ 'BroadcastCurrentPageTitle' => 'ChangeCurrentPageTitle' ];

    public function mount ()
    {
        $user       = Auth::user ();
        $this->role = $user->role;
        $this->name = $user->name;
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
            'role' => $this->role,
            'name' => $this->name,
            'page' => $this->page,
        ] );
    }
}
