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

Route::get (
    '/admin-dashboard',
    [ AdminDashboardController::class, 'index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'dashboard.admin.index' );

Route::get (
    '/admin-dashboard/student-table',
    [ AdminDashboardController::class, 'student_table_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.student-table.index' );

Route::get (
    '/admin-dashboard/teacher-table',
    [ AdminDashboardController::class, 'teacher_table_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.teacher-table.index' );

Route::get (
    '/admin-dashboard/student-add',
    [ AdminDashboardController::class, 'student_add_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.student-add.index' );

Route::get (
    '/admin-dashboard/teacher-add',
    [ AdminDashboardController::class, 'teacher_add_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.teacher-add.index' );

Route::get (
    '/admin-dashboard/student-detail/{id}',
    [ AdminDashboardController::class, 'student_detail_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.student-detail.index' );

Route::get (
    '/admin-dashboard/teacher-detail/{id}',
    [ AdminDashboardController::class, 'teacher_detail_index' ]
)
    ->middleware ( 'auth' )
    ->name ( 'admin.teacher-detail.index' );

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