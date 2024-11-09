<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    private $token, $role, $name;

    public function mount ()
    {
        $user       = Auth::user ();
        $this->role = $user->role;
        $this->name = $user->name;
    }

    public function showTeacherTable ()
    {
        $this->dispatch ( 'loadTeacherTable' );
    }

    public function showStudentTable ()
    {
        $this->dispatch ( 'loadStudentTable' );
    }

    public function render ()
    {
        $this->mount ();
        return view ( 'livewire.partials.navbar', [ 
            'role' => $this->role,
            'name' => $this->name
        ] );
    }
}
