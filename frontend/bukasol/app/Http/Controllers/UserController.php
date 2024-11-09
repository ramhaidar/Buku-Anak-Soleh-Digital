<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index ()
    {
        return view ( 'auth.login' );
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login ( Request $request )
    {
        // Validate input
        $request->validate ( [ 
            'username' => 'required|string',
            'password' => 'required|string',
        ] );

        // Find user by username
        $user = User::where ( 'username', $request->username )->first ();

        // Check if user exists and verify password
        if ( $user && Hash::check ( $request->password, $user->password ) )
        {
            // Authenticate the user
            Auth::login ( $user );

            // Redirect to the dashboard
            return redirect ( '/dashboard' )->with ( 'success', __ ( 'auth.success' ) );
        }

        // If authentication fails, redirect back with an error message
        return redirect ()->back ()->with ( 'error', __ ( 'auth.failed' ) );
    }

    /**
     * Log the user out (Invalidate the session).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout ()
    {
        // Log the user out using Auth facade
        Auth::logout ();

        // Redirect to the home page
        return redirect ( '/' );
    }
}
