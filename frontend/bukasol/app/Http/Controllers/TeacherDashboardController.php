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

    public function laporan_bacaan_juz01_siswa_detail_index ( $id )
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

    public function laporan_bacaan_juz29_siswa_detail_index ( $id )
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

    public function laporan_bacaan_juz30_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.laporan-bacaan-juz30-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Laporan Bacaan Juz 30 Siswa"
        ] );
    }

    public function nilai_uji_gerakan_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-gerakan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Nilai Uji Gerakan Siswa Table"
        ] );
    }

    public function nilai_uji_gerakan_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-gerakan-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Nilai Uji Gerakan Siswa"
        ] );
    }

    public function nilai_uji_gerakan_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.add-nilai-uji-gerakan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Nilai Uji Gerakan Siswa"
        ] );
    }

    public function nilai_uji_gerakan_siswa_edit_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.edit-nilai-uji-gerakan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Edit Nilai Uji Gerakan Siswa"
        ] );
    }

    public function nilai_uji_bacaan_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Nilai Uji Bacaan Siswa Table"
        ] );
    }

    public function nilai_uji_bacaan_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.nilai-uji-bacaan-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Nilai Uji Bacaan Siswa"
        ] );
    }

    public function nilai_uji_bacaan_siswa_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.add-nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Tambah Nilai Uji Bacaan Siswa"
        ] );
    }

    public function nilai_uji_bacaan_siswa_edit_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.edit-nilai-uji-bacaan-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Edit Nilai Uji Bacaan Siswa"
        ] );
    }

    public function aktivitas_membaca_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.aktivitas-membaca-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Aktivitas Membaca Siswa Table"
        ] );
    }

    public function aktivitas_membaca_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.aktivitas-membaca-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Aktivitas Membaca Siswa"
        ] );
    }

    public function catatan_harian_siswa_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'teacher.catatan-harian-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Catatan Harian Siswa Table"
        ] );
    }

    public function catatan_harian_siswa_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.catatan-harian-siswa-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Catatan Harian Siswa"
        ] );
    }

    public function catatan_harian_siswa_detail_detail_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.catatan-harian-siswa-detail-detail', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Detail Catatan Harian Siswa Detail"
        ] );
    }

    public function catatan_harian_siswa_detail_detail_answer_index ( $id )
    {
        $auth = auth ()->user ();

        return view ( 'teacher.answer-catatan-harian-siswa', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Jawab Pertanyaan Orang Tua Siswa"
        ] );
    }
}
