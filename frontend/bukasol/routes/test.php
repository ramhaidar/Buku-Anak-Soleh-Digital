<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function nilai_uji_bacaan_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Nilai Uji bacaan Siswa Table"
        ] );
    }

    public function nilai_uji_bacaan_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-bacaan-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Nilai Uji bacaan Siswa"
        ] );
    }

    public function nilai_uji_bacaan_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.add-nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Nilai Uji bacaan Siswa"
        ] );
    }

    public function nilai_uji_bacaan_siswa_edit_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.edit-nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Edit Nilai Uji bacaan Siswa"
        ] );
    }
}
