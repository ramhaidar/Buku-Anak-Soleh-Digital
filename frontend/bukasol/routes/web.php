<?php

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Admin\StudentTable;
use App\Livewire\Admin\TeacherTable;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentPrayerGradeController;
use App\Http\Controllers\StudentPrayerRecitationGradeController;

use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherPrayerGradeController;
use App\Http\Controllers\TeacherPrayerRecitationGradeController;

Route::get ( '/', function ()
{
    return redirect ()->route ( 'login.index' );
} );

Route::get (
    '/login',
    [ UserController::class, 'login_index' ]
)
    ->middleware ( 'Authenticated' )
    ->name ( 'login.index' );

Route::post (
    '/login',
    [ UserController::class, 'login' ]
)
    ->middleware ( 'Authenticated' )
    ->name ( 'login' );

Route::post (
    '/logout',
    [ UserController::class, 'logout' ]
)->name ( 'logout' );

Route::get (
    '/dashboard',
    [ DashboardController::class, 'index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'dashboard.index' );

Route::prefix ( 'student-dashboard' )
    ->middleware ( 'Student' )
    ->group ( function ()
    {
        Route::get (
            '/',
            [ StudentDashboardController::class, 'index' ]
        )
            ->name ( 'dashboard.student.index' );

        Route::get (
            '/laporan-muhasabah-siswa',
            [ StudentDashboardController::class, 'laporan_muhasabah_siswa_table_index' ]
        )
            ->name ( 'student.laporan-muhasabah-siswa-table.index' );

        Route::get (
            '/laporan-muhasabah-siswa-detail/{id}',
            [ StudentDashboardController::class, 'laporan_muhasabah_siswa_detail_index' ]
        )
            ->name ( 'student.laporan-muhasabah-siswa-detail.index' );


        Route::get (
            '/laporan-pelanggaran-siswa',
            [ StudentDashboardController::class, 'laporan_pelanggaran_siswa_table_index' ]
        )
            ->name ( 'student.laporan-pelanggaran-siswa-table.index' );

        Route::get (
            '/laporan-pelanggaran-siswa-detail/{id}',
            [ StudentDashboardController::class, 'laporan_pelanggaran_siswa_detail_index' ]
        )
            ->name ( 'student.laporan-pelanggaran-siswa-detail.index' );

        Route::get (
            '/laporan-bacaan-juz01-siswa',
            [ StudentDashboardController::class, 'laporan_bacaan_juz01_siswa_table_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz01-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz01-siswa-add',
            [ StudentDashboardController::class, 'laporan_bacaan_juz01_siswa_add_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz01-siswa-add.index' );


        Route::get (
            '/laporan-bacaan-juz29-siswa',
            [ StudentDashboardController::class, 'laporan_bacaan_juz29_siswa_table_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz29-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz29-siswa-add',
            [ StudentDashboardController::class, 'laporan_bacaan_juz29_siswa_add_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz29-siswa-add.index' );

        Route::get (
            '/laporan-bacaan-juz30-siswa',
            [ StudentDashboardController::class, 'laporan_bacaan_juz30_siswa_table_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz30-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz30-siswa-add',
            [ StudentDashboardController::class, 'laporan_bacaan_juz30_siswa_add_index' ]
        )
            ->name ( 'student.laporan-bacaan-juz30-siswa-add.index' );

        // Student Prayer Grade
        Route::get (
            '/nilai-uji-gerakan-siswa',
            [ StudentPrayerGradeController::class, 'index' ]
        )
            ->name ( 'student.nilai-uji-gerakan-siswa-table.index' );

        Route::put (
            '/prayer-grade/parent-sign/{id}',
            [ StudentPrayerGradeController::class, 'parent_sign_prayer_grade' ]
        )
            ->name ( 'prayer-grade.parent-sign' );

        Route::get (
            '/nilai-uji-bacaan-siswa',
            [ StudentDashboardController::class, 'nilai_uji_bacaan_siswa_table_index' ]
        )
            ->name ( 'student.nilai-uji-bacaan-siswa-table.index' );

        Route::get (
            '/catatan-harian-siswa',
            [ StudentDashboardController::class, 'catatan_harian_siswa_table_index' ]
        )
            ->name ( 'student.catatan-harian-siswa-table.index' );

        Route::get (
            '/catatan-harian-siswa-detail/{id}',
            [ StudentDashboardController::class, 'catatan_harian_siswa_detail_index' ]
        )
            ->name ( 'student.catatan-harian-siswa-detail.index' );

        Route::get (
            '/catatan-harian-siswa-add',
            [ StudentDashboardController::class, 'catatan_harian_siswa_add_index' ]
        )
            ->name ( 'student.catatan-harian-siswa-add.index' );

        Route::get (
            '/aktivitas-membaca-siswa',
            [ StudentDashboardController::class, 'aktivitas_membaca_siswa_table_index' ]
        )
            ->name ( 'student.aktivitas-membaca-siswa-table.index' );

        Route::get (
            '/aktivitas-membaca-siswa-add',
            [ StudentDashboardController::class, 'aktivitas_membaca_siswa_add_index' ]
        )
            ->name ( 'student.aktivitas-membaca-siswa-add.index' );
    } );

Route::prefix ( 'teacher-dashboard' )
    ->middleware ( 'Teacher' )
    ->group ( function ()
    {
        Route::get (
            '/',
            [ TeacherDashboardController::class, 'index' ]
        )
            ->name ( 'dashboard.teacher.index' );

        Route::get (
            '/laporan-muhasabah-siswa',
            [ TeacherDashboardController::class, 'laporan_muhasabah_siswa_table_index' ]
        )
            ->name ( 'teacher.laporan-muhasabah-siswa-table.index' );

        Route::get (
            '/laporan-muhasabah-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'laporan_muhasabah_siswa_detail_index' ]
        )
            ->name ( 'teacher.laporan-muhasabah-siswa-detail.index' );

        Route::get (
            '/laporan-muhasabah-siswa-detail-siswa/{id}',
            [ TeacherDashboardController::class, 'laporan_muhasabah_siswa_detail_siswa_index' ]
        )
            ->name ( 'teacher.laporan-muhasabah-siswa-detail-siswa.index' );

        Route::get (
            '/laporan-pelanggaran-siswa',
            [ TeacherDashboardController::class, 'laporan_pelanggaran_siswa_table_index' ]
        )
            ->name ( 'teacher.laporan-pelanggaran-siswa-table.index' );

        Route::get (
            '/laporan-pelanggaran-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'laporan_pelanggaran_siswa_detail_index' ]
        )
            ->name ( 'teacher.laporan-pelanggaran-siswa-detail.index' );

        Route::get (
            '/laporan-pelanggaran-siswa-detail-siswa/{id}',
            [ TeacherDashboardController::class, 'laporan_pelanggaran_siswa_detail_siswa_index' ]
        )
            ->name ( 'teacher.laporan-pelanggaran-siswa-detail-siswa.index' );

        Route::get (
            '/laporan-pelanggaran-siswa-add',
            [ TeacherDashboardController::class, 'laporan_pelanggaran_siswa_add_index' ]
        )
            ->name ( 'teacher.laporan-pelanggaran-siswa-add.index' );

        Route::get (
            '/laporan-bacaan-juz01-siswa',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz01_siswa_table_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz01-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz01-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz01_siswa_detail_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz01-siswa-detail.index' );

        Route::get (
            '/laporan-bacaan-juz29-siswa',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz29_siswa_table_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz29-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz29-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz29_siswa_detail_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz29-siswa-detail.index' );

        Route::get (
            '/laporan-bacaan-juz30-siswa',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz30_siswa_table_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz30-siswa-table.index' );

        Route::get (
            '/laporan-bacaan-juz30-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'laporan_bacaan_juz30_siswa_detail_index' ]
        )
            ->name ( 'teacher.laporan-bacaan-juz30-siswa-detail.index' );

        // Teacher Prayer Grade
        Route::get (
            '/nilai-uji-gerakan-siswa',
            [ TeacherPrayerGradeController::class, 'index_teacher' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-table.index' );

        Route::get (
            '/nilai-uji-gerakan-siswa-detail/{id}',
            [ TeacherPrayerGradeController::class, 'index_student' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-detail.index' );

        Route::get (
            '/nilai-uji-gerakan-siswa-add/{id}',
            [ TeacherPrayerGradeController::class, 'index_add_grade' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-add.index' );

        Route::post (
            '/prayer-grade',
            [ TeacherPrayerGradeController::class, 'store_prayer_grade' ]
        )
            ->name('prayer-grade.store');

        Route::get (
            '/nilai-uji-gerakan-siswa-edit/{id}',
            [ TeacherPrayerGradeController::class, 'index_edit_grade' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-edit.index' );

        Route::put (
            '/prayer-grade/{id}',
            [ TeacherPrayerGradeController::class, 'update_prayer_grade' ]
        )
            ->name ( 'prayer-grade.update' );

        Route::delete (
            '/prayer-grade/{id}',
            [ TeacherPrayerGradeController::class, 'delete_prayer_grade' ]
        )
            ->name ( 'prayer-grade.delete' );

        Route::put (
            '/prayer-grade/teacher-sign/{id}',
            [ TeacherPrayerGradeController::class, 'teacher_sign_prayer_grade' ]
        )
            ->name ( 'prayer-grade.teacher-sign' );

        // Teacher Prayer Recitation Grade
        Route::get (
            '/nilai-uji-bacaan-siswa',
            [ TeacherPrayerRecitationGradeController::class, 'index_teacher' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-table.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa-detail/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'index_student' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-detail.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa-add/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'index_add_grade' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-add.index' );

        Route::post (
            '/prayer-recitation-grade',
            [ TeacherPrayerRecitationGradeController::class, 'store_prayer_recitation_grade' ]
        )
            ->name('prayer-recitation.store');

        Route::get (
            '/nilai-uji-bacaan-siswa-edit/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'index_edit_grade' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-edit.index' );

        Route::put (
            '/prayer-recitation-grade/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'update_prayer_recitation_grade' ]
        )
            ->name ( 'prayer-recitation-grade.update' );

        Route::delete (
            '/prayer-recitation-grade/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'delete_prayer_recitation_grade' ]
        )
            ->name ( 'prayer-recitation-grade.delete' );

        Route::put (
            '/prayer-recitation-grade/teacher-sign/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'teacher_sign_prayer_recitation_grade' ]
        )
            ->name ( 'prayer-recitation-grade.teacher-sign' );

        // Teacher Notes Activity

        Route::get (
            '/aktivitas-membaca-siswa',
            [ TeacherDashboardController::class, 'aktivitas_membaca_siswa_table_index' ]
        )
            ->name ( 'teacher.aktivitas-membaca-siswa-table.index' );

        Route::get (
            '/aktivitas-membaca-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'aktivitas_membaca_siswa_detail_index' ]
        )
            ->name ( 'teacher.aktivitas-membaca-siswa-detail.index' );

        Route::get (
            '/catatan-harian-siswa',
            [ TeacherDashboardController::class, 'catatan_harian_siswa_table_index' ]
        )
            ->name ( 'teacher.catatan-harian-siswa-table.index' );

        Route::get (
            '/catatan-harian-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'catatan_harian_siswa_detail_index' ]
        )
            ->name ( 'teacher.catatan-harian-siswa-detail.index' );

        Route::get (
            '/catatan-harian-siswa-detail-detail/{id}',
            [ TeacherDashboardController::class, 'catatan_harian_siswa_detail_detail_index' ]
        )
            ->name ( 'teacher.catatan-harian-siswa-detail-detail.index' );

        Route::get (
            '/catatan-harian-siswa-detail-detail-answer/{id}',
            [ TeacherDashboardController::class, 'catatan_harian_siswa_detail_detail_answer_index' ]
        )
            ->name ( 'teacher.catatan-harian-siswa-detail-detail-answer.index' );
    } );

Route::prefix ( 'admin-dashboard' )
    ->middleware ( 'Admin' )
    ->group ( function ()
    {
        Route::get (
            '/',
            [ AdminDashboardController::class, 'index' ]
        )
            ->name ( 'dashboard.admin.index' );

        Route::get (
            '/student-table',
            [ AdminDashboardController::class, 'student_table_index' ]
        )
            ->name ( 'admin.student-table.index' );

        Route::get (
            '/teacher-table',
            [ AdminDashboardController::class, 'teacher_table_index' ]
        )
            ->name ( 'admin.teacher-table.index' );

        Route::get (
            '/student-add',
            [ AdminDashboardController::class, 'student_add_index' ]
        )
            ->name ( 'admin.student-add.index' );

        Route::get (
            '/teacher-add',
            [ AdminDashboardController::class, 'teacher_add_index' ]
        )
            ->name ( 'admin.teacher-add.index' );

        Route::get (
            '/student-detail/{id}',
            [ AdminDashboardController::class, 'student_detail_index' ]
        )
            ->name ( 'admin.student-detail.index' );

        Route::get (
            '/teacher-detail/{id}',
            [ AdminDashboardController::class, 'teacher_detail_index' ]
        )
            ->name ( 'admin.teacher-detail.index' );
    } );


// Rute untuk menangani Paginasi Tabel
Route::middleware ( 'auth' )
    ->group ( function ()
    {
        Route::post (
            '/teacher/fetchData',
            [ AdminDashboardController::class, 'fetchData_teacher' ]
        )->name ( 'teacher.fetchData' );

        Route::post (
            '/student/fetchData',
            [ AdminDashboardController::class, 'fetchData_student' ]
        )->name ( 'student.fetchData' );

        Route::post (
            '/nilai-uji-gerakan/fetchData',
            [ TeacherPrayerGradeController::class, 'fetchData_nilai_uji_gerakan_by_nama_kelas' ]
        )->name ( 'nilai_uji_gerakan.fetchData' );

        Route::post (
            '/nilai-uji-gerakan-detail/fetchData/{id}',
            [ TeacherPrayerGradeController::class, 'fetchData_nilai_uji_gerakan_by_id_siswa' ]
        )->name ( 'nilai_uji_gerakan_detail.fetchData' );

        Route::post (
            '/siswa-nilai-uji-gerakan/fetchData',
            [ StudentPrayerGradeController::class, 'fetchData_nilai_uji_gerakan_by_id_siswa' ]
        )->name ( 'siswa.nilai_uji_gerakan.fetchData' );

        Route::get (
            '/prayer-grade-report/{id}',
            [ TeacherPrayerGradeController::class, 'prayer_grade_pdf' ]
        )
            ->name ( 'prayer-grade.convert-pdf' );

        Route::post (
            '/nilai-uji-bacaan/fetchData',
            [ TeacherPrayerRecitationGradeController::class, 'fetchData_nilai_uji_bacaan_by_nama_kelas' ]
        )->name ( 'nilai_uji_bacaan.fetchData' );

        Route::post (
            '/nilai-uji-bacaan-detail/fetchData/{id}',
            [ TeacherPrayerRecitationGradeController::class, 'fetchData_nilai_uji_bacaan_by_id_siswa' ]
        )->name ( 'nilai_uji_bacaan_detail.fetchData' );
    } );

// Rute untuk menangani proses CRUD data Guru
Route::middleware ( 'auth' )
    ->group ( function ()
    {
        Route::post (
            '/teachers',
            [ TeacherController::class, 'store' ]
        )->name ( 'teachers.store' );

        Route::get (
            '/teachers/{teacher}',
            [ TeacherController::class, 'show' ]
        )->name ( 'teachers.show' );

        Route::put (
            '/teachers/{teacher}',
            [ TeacherController::class, 'update' ]
        )->name ( 'teachers.update' );

        Route::delete (
            '/teachers/{teacher}',
            [ TeacherController::class, 'destroy' ]
        )->name ( 'teachers.destroy' );

    } );

// Rute untuk menangani proses CRUD data Siswa
Route::middleware ( 'auth' )
    ->group ( function ()
    {
        Route::post (
            '/students',
            [ StudentController::class, 'store' ]
        )->name ( 'students.store' );

        Route::get (
            '/students/{student}',
            [ StudentController::class, 'show' ]
        )->name ( 'students.show' );

        Route::put (
            '/students/{student}',
            [ StudentController::class, 'update' ]
        )->name ( 'students.update' );

        Route::delete (
            '/students/{student}',
            [ StudentController::class, 'destroy' ]
        )->name ( 'students.destroy' );
    } );

// Route untuk menangani proses ganti password
Route::get (
    '/change-password',
    [ UserController::class, 'changePassword_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'change-password.index' );

Route::post (
    '/change-password',
    [ UserController::class, 'changePassword' ]
)
    ->middleware ( 'auth' )
    ->name ( 'change-password' );