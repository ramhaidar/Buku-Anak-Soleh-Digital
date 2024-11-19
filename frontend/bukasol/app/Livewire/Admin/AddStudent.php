<?php

namespace App\Livewire\Admin;

use App\Models\Teacher;
use Livewire\Component;

class AddStudent extends Component
{
    public $teachers = [];

    public function mount ()
    {
        $this->teachers = Teacher::with ( 'user' )->get ()->all ();
    }

    public function render ()
    {
        return view ( 'livewire.admin.add-student' );
    }
}
