<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $role, $name;

    public function mount ()
    {
        $user       = Auth::user ();
        $this->role = $user->role;
        $this->name = $user->name;
    }

    public function render ()
    {
        // $this->mount ();
        return view ( 'livewire.partials.navbar' );
    }
}
