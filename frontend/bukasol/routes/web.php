<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserCookies;
use App\Http\Controllers\DashboardController;

// Route::get ( '/', function ()
// {
//     return view ( 'welcome' );
// } );

Route::get ( '/', function ()
{
    return redirect ()->route ( 'login.index' );
} );

Route::get ( '/dashboard', function ()
{
    return view ( 'dashboard' );
} );

Route::get ( '/login', [ UserController::class, 'index' ] )->name ( 'login.index' );

Route::post ( '/login', [ UserController::class, 'login' ] )->name ( 'login.post' );

Route::get ( '/check-cookie', [ UserController::class, 'checkCookie' ] );

Route::get (
    '/dashboard',
    [ DashboardController::class, 'index' ]
)
    ->middleware ( CheckUserCookies::class)
    ->name ( 'dashboard.index' );

// Route::get (
//     '/dashboard',
//     [ Dashboard::class, 'render' ]
// )
//     ->middleware ( CheckUserCookies::class)
//     ->name ( 'dashboard.index' );