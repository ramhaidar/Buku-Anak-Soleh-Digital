<?php

namespace App\Livewire\Teacher;

use Livewire\Component;

class TeacherDashboard extends Component
{
    public $view = null; // Default to null so nothing is displayed initially

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
        return view ( 'livewire.teacher.teacher-dashboard' );
    }
}
