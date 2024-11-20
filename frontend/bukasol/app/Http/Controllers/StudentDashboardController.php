<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index ()
    {
        return redirect ()->route ( 'student.laporan-muhasabah-siswa-table.index' );
    }

    public function laporan_muhasabah_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-muhasabah-harian', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Muhasabah Siswa Table"
        ] );
    }

    public function laporan_muhasabah_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-muhasabah-harian-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Muhasabah Siswa"
        ] );
    }

    public function laporan_pelanggaran_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-pelanggaran-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Pelanggaran Siswa Table"
        ] );
    }

    public function laporan_pelanggaran_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-pelanggaran-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Pelanggaran Siswa"
        ] );
    }

    public function laporan_bacaan_juz01_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-bacaan-juz01', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 01 Table"
        ] );
    }

    public function laporan_bacaan_juz01_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.add-laporan-bacaan-juz01', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Laporan Bacaan Juz 01"
        ] );
    }

    public function laporan_bacaan_juz29_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-bacaan-juz29', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 29 Table"
        ] );
    }

    public function laporan_bacaan_juz29_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.add-laporan-bacaan-juz29', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Laporan Bacaan Juz 29"
        ] );
    }

    public function laporan_bacaan_juz30_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.laporan-bacaan-juz30', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Laporan Bacaan Juz 30 Table"
        ] );
    }

    public function laporan_bacaan_juz30_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.add-laporan-bacaan-juz30', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Laporan Bacaan Juz 30"
        ] );
    }

    public function nilai_uji_gerakan_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.nilai-uji-gerakan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Nilai Uji Gerakan Siswa Table"
        ] );
    }

    public function nilai_uji_bacaan_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Nilai Uji Bacaan Siswa Table"
        ] );
    }

    public function catatan_harian_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.catatan-harian-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Catatan Harian Siswa Table"
        ] );
    }

    public function catatan_harian_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'student.catatan-harian-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Catatan Harian Siswa"
        ] );
    }

    public function catatan_harian_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.add-catatan-harian-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Catatan Harian Siswa"
        ] );
    }

    public function aktivitas_membaca_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.aktivitas-membaca-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Aktivitas Membaca Siswa Table"
        ] );
    }

    public function aktivitas_membaca_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'student.add-aktivitas-membaca-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Aktivitas Membaca Siswa"
        ] );
    }
}
