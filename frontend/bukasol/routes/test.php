<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function laporan_bacaan_juz30_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz30', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 30 Siswa Table"
        ] );
    }

    public function laporan_bacaan_juz30_siswa_detail_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz30-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Bacaan Juz 30 Siswa"
        ] );
    }
}