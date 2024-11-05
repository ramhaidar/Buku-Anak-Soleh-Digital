<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Footer extends Component
{
    public $pageTitle;

    protected $listeners = [ 
        'BroadcastCurrentPageTitle' => 'ChangeCurrentFooterText',
        'XXX'                       => 'ChangeCurrentFooterText',
    ];

    public function boot ()
    {
        // $this->on ( 'XXX', fn () => $this->ChangeCurrentFooterText ( "TEST" ) );
    }


    public function mount ()
    {
        // $this->pageTitle = "Footer";
    }

    // #[On('MMM') ]
    public function ChangeCurrentFooterText ( $pageTitle )
    {
        // dd ( "TEST" );
        $this->pageTitle = $pageTitle;
    }

    public function render ()
    {
        return view ( 'livewire.partials.footer' );
    }
}
