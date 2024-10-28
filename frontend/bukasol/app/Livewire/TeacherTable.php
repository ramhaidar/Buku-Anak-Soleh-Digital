<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class TeacherTable extends Component
{
    public $teachers = [];
    public $page = 0;
    public $size = 10;
    public $showTeacherTable = false;

    protected $listeners = [ 
        'loadTeacherTable' => 'loadTeachers'
    ];

    public function displayTeacherTable ()
    {
        $this->showTeacherTable = true;
    }

    public function loadTeachers ()
    {
        $token    = Cookie::get ( 'token' );
        $response = Http::withToken ( $token )->get ( "http://127.0.0.1:8080/api/v1/users/admin/teacher-account", [ 
            'page' => $this->page,
            'size' => $this->size,
        ] );
        // $this->dispatch ( 'showTeacherTable', true );  // Emit event with visibility state
        $this->teachers         = $response->successful () ? $response->json ()[ 'content' ] : [];
        $this->showTeacherTable = true;
    }

    public function render ()
    {
        return view ( 'livewire.teacher.teacher-table' );
    }
}
