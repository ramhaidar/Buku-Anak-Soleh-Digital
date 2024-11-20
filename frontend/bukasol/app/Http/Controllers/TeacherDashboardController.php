<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index ()
    {
        return redirect ()->route ( 'teacher.laporan-muhasabah-siswa-table.index' );
    }

    public function laporan_muhasabah_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-muhasabah-harian', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Muhasabah Siswa Table"
        ] );
    }

    public function laporan_muhasabah_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-muhasabah-harian-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Muhasabah Siswa"
        ] );
    }

    public function laporan_muhasabah_siswa_detail_siswa_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-muhasabah-harian-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Muhasabah Siswa"
        ] );
    }

    public function laporan_pelanggaran_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-pelanggaran-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Pelanggaran Siswa Table"
        ] );
    }

    public function laporan_pelanggaran_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-pelanggaran-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Pelanggaran Siswa"
        ] );
    }

    public function laporan_pelanggaran_siswa_detail_siswa_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-pelanggaran-siswa-detail-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Pelanggaran Siswa"
        ] );
    }

    public function laporan_pelanggaran_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.add-laporan-pelanggaran-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Laporan Pelanggaran Siswa"
        ] );
    }

    public function laporan_bacaan_juz01_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz01', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 01 Siswa Table"
        ] );
    }

    public function laporan_bacaan_juz01_siswa_detail_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz01-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Bacaan Juz 01 Siswa"
        ] );
    }

    public function laporan_bacaan_juz29_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz29', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 29 Siswa Table"
        ] );
    }

    public function laporan_bacaan_juz29_siswa_detail_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz29-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Bacaan Juz 29 Siswa"
        ] );
    }

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
