<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class StudentTable extends Component
{
    public $students = [];
    public $page = 0;
    public $size = 10;
    public $showStudentTable = false;

    protected $listeners = [ 
        'loadStudentTable' => 'loadStudents',
        'loadTeacherTable' => 'hideStudentTable'
    ];

    public function hideStudentTable ()
    {
        $this->showStudentTable = false;
    }

    public function displayStudentTable ()
    {
        $this->showStudentTable = true;
    }

    public function loadStudents ()
    {
        $token    = Cookie::get ( 'token' );
        $response = Http::withToken ( $token )->get ( "http://127.0.0.1:8080/api/v1/users/admin/student-account", [ 
            'page' => $this->page,
            'size' => $this->size,
        ] );
        // $this->dispatch ( 'showStudentTable', true );  // Emit event with visibility state
        $this->students = $response->successful () ? $response->json ()[ 'content' ] : [];
        // dd ( $response->json () );
        $this->showStudentTable = true;
    }

    public function render ()
    {
        return view ( 'livewire.admin.student-table' );
    }

}
