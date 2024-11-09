<?php

namespace App\Livewire;

use Livewire\Component;

class PreRun extends Component
{
    public function test ()
    {
        $this->dispatch ( "ChangeDashboardFooterText", "Dashboard Admin" );
    }

    public function render ()
    {
        return view ( 'livewire.layouts.pre-run' );
    }
}
