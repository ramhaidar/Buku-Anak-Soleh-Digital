<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class AdminDashboard extends Component
{
    public $token, $role, $name;
    public $showTeacherTable = false;

    // listen for showTeacherTable if found then set showTeacherTable to true
    protected $listeners = [ 'showTeacherTable' => 'displayTeacherTable' ];

    public function mount ()
    {
        $this->token = Cookie::get ( 'token' );
        $this->role  = Cookie::get ( 'role' );
        $this->name  = Cookie::get ( 'name' );
    }

    public function displayTeacherTable ()
    {
        $this->showTeacherTable = true;
    }

    public function render ()
    {
        return view ( 'livewire.admin.admin-dashboard' );
    }
}
