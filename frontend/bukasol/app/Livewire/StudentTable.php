<?php

namespace App\Livewire;

use Livewire\Component;

class StudentTable extends Component
{
    public $class = null; // Menyimpan informasi class yang dipilih
    public $students = [];   // Menyimpan data students yang akan ditampilkan

    // Fungsi untuk memuat data students berdasarkan class
    public function loadstudents ( $class )
    {
        $this->class = $class;

        // Simulasi data students berdasarkan class
        if ( $class === 'A' )
        {
            $this->students = [ 
                [ 'nama' => 'students 1', 'umur' => 16, 'class' => 'A' ],
                [ 'nama' => 'students 2', 'umur' => 17, 'class' => 'A' ],
            ];
        }
        elseif ( $class === 'B' )
        {
            $this->students = [ 
                [ 'nama' => 'students 3', 'umur' => 16, 'class' => 'B' ],
                [ 'nama' => 'students 4', 'umur' => 17, 'class' => 'B' ],
            ];
        }
    }

    public function render ()
    {
        return view ( 'livewire.student.student-table' );
    }

}
