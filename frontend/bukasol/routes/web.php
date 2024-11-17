<?php

use App\Livewire\Admin\StudentTable;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\Admin\TeacherTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;

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

// Route::get ( '/login', [ UserController::class, 'index' ] )->name ( 'login.index' );
Route::get (
    '/login',
    [ Login::class, 'render' ]
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
    '/check-cookie',
    [ UserController::class, 'checkCookie' ]
);

// Route::get (
//     '/dashboard',
//     [ DashboardController::class, 'index' ]
// )
//     ->middleware ( CheckUserCookies::class)
//     ->name ( 'dashboard.index' );

Route::get (
    '/dashboard',
    [ Dashboard::class, 'render' ]
)
    ->middleware ( 'Guest' )
    ->name ( 'dashboard.index' );

Route::get ( '/test', function ()
{
    return view ( 'test' );
} );

Route::post (
    '/teacher/fetchData',
    [ TeacherTable::class, 'fetchData' ]
)->name ( 'teacher.fetchData' );

Route::post (
    '/student/fetchData',
    [ StudentTable::class, 'fetchData' ]
)->name ( 'student.fetchData' );

Route::middleware ( 'auth' )->group ( function ()
{
    // Store a newly created teacher and user
    Route::post (
        '/teachers',
        [ TeacherController::class, 'store' ]
    )->name ( 'teachers.store' );

    // Show a specific teacher's details
    Route::get (
        '/teachers/{teacher}',
        [ TeacherController::class, 'show' ]
    )->name ( 'teachers.show' );

    // Update the specified teacher and user
    Route::put (
        '/teachers/{teacher}',
        [ TeacherController::class, 'update' ]
    )->name ( 'teachers.update' );

    // Delete the specified teacher and user
    Route::delete (
        '/teachers/{teacher}',
        [ TeacherController::class, 'destroy' ]
    )->name ( 'teachers.destroy' );

} );

// Route untuk menangani proses ganti password
Route::post (
    '/change-password',
    [ UserController::class, 'changePassword' ]
)
    ->middleware ( 'auth' )
    ->name ( 'change-password' );