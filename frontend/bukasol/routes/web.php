<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get ( '/', function ()
{
    return view ( 'welcome' );
} );

// LOGIN RETURN VIEW
Route::get ( '/login', function ()
{
    return view ( 'auth.login' );
} );

Route::get ( '/test', function ()
{
    return view ( 'test' );
} );

// LOGIN POST
Route::post ( '/login', [ UserController::class, 'login' ] )->name ( 'login.post' );

Route::get ( '/check-cookie', [ UserController::class, 'checkCookie' ] );
