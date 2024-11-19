<?php

namespace App\Livewire;

use Livewire\Component;

class ChangePassword extends Component
{
    public $showChangePassword = false;

    protected $listeners = [ 
        'loadChangePassword' => 'showChangePassword',
        'loadTeacherTable'   => 'hideChangePassword',
        'loadStudentTable'   => 'hideChangePassword',
    ];

    public function hideChangePassword ()
    {
        $this->showChangePassword = false;
    }

    public function showChangePassword ()
    {
        $this->showChangePassword = true;
    }

    public function render ()
    {
        return view ( 'livewire.change-password' );
    }
}
