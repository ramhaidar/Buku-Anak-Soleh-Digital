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
use App\Http\Controllers\TeacherDashboardController;

// Route::get ( '/', function ()
// {
//     return view ( 'welcome' );
// } );

Route::get ( '/', function ()
{
    return redirect ()->route ( 'login.index' );
} );

// Route::get ( '/dashboard', function ()
// {
//     return view ( 'dashboard' );
// } );

Route::get (
    '/login',
    [ UserController::class, 'login_index' ]
)
    ->middleware ( 'Authenticated' )
    ->name ( 'login.index' );

// Route::get (
//     '/login',
//     [ Login::class, 'render' ]
// )
//     ->middleware ( 'Authenticated' )
//     ->name ( 'login.index' );

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
    '/logout',
    [ UserController::class, 'logout' ]
)->name ( 'logout' );

// Route::get (
//     '/check-cookie',
//     [ UserController::class, 'checkCookie' ]
// );

Route::get (
    '/dashboard',
    [ DashboardController::class, 'index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'dashboard.index' );

Route::prefix ( 'teacher-dashboard' )
    ->middleware ( 'auth' )
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

        Route::get (
            '/nilai-uji-gerakan-siswa',
            [ TeacherDashboardController::class, 'nilai_uji_gerakan_siswa_table_index' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-table.index' );

        Route::get (
            '/nilai-uji-gerakan-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'nilai_uji_gerakan_siswa_detail_index' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-detail.index' );

        Route::get (
            '/nilai-uji-gerakan-siswa-add',
            [ TeacherDashboardController::class, 'nilai_uji_gerakan_siswa_add_index' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-add.index' );

        Route::get (
            '/nilai-uji-gerakan-siswa-edit/{id}',
            [ TeacherDashboardController::class, 'nilai_uji_gerakan_siswa_edit_index' ]
        )
            ->name ( 'teacher.nilai-uji-gerakan-siswa-edit.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa',
            [ TeacherDashboardController::class, 'nilai_uji_bacaan_siswa_table_index' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-table.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa-detail/{id}',
            [ TeacherDashboardController::class, 'nilai_uji_bacaan_siswa_detail_index' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-detail.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa-add',
            [ TeacherDashboardController::class, 'nilai_uji_bacaan_siswa_add_index' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-add.index' );

        Route::get (
            '/nilai-uji-bacaan-siswa-edit/{id}',
            [ TeacherDashboardController::class, 'nilai_uji_bacaan_siswa_edit_index' ]
        )
            ->name ( 'teacher.nilai-uji-bacaan-siswa-edit.index' );

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
    } );

Route::prefix ( 'admin-dashboard' )
    ->middleware ( 'auth' )
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
    } );

Route::get ( '/test', function ()
{
    return view ( 'test' );
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