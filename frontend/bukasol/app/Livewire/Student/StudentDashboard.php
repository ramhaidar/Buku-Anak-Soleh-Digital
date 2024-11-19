<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\Attributes\On;

class StudentDashboard extends Component
{
    public $view = null;

    #[On('switchView') ]
    public function updateView ( $view )
    {
        $this->view = $view;
        $this->dispatch ( 'viewSwitched' ); // Trigger JavaScript reinitialization if needed

        // log message to be shown on the frontend (Livewire 3 so emit is not exist)
        // $this->dispatch ( 'message', "View switched to {$view}" );
    }

    public function render ()
    {
        return view ( 'livewire.student.student-dashboard' );
    }
}
