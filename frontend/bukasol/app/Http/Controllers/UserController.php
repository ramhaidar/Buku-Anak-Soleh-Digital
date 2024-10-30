<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function index ()
    {
        return view ( 'auth.login' );
    }
    public function login ( Request $request )
    {
        // Validasi input
        $request->validate ( [ 
            'username' => 'required',
            'password' => 'required'
        ] );

        // Siapkan data dan hitung Content-Length
        $data = [ 
            'username' => $request->username,
            'password' => $request->password
        ];

        $jsonData      = json_encode ( $data );
        $contentLength = strlen ( $jsonData );

        // Kirim permintaan POST dengan header dan data JSON
        $response = Http::withHeaders ( [ 
            'Content-Type'   => 'application/json',
            'Content-Length' => $contentLength,
            // 'Authorization'  => 'Bearer ' . $request->bearerToken ()
        ] )->post ( 'http://localhost:8080/api/v1/users/auth/login', $data );

        // Cek apakah respons sukses dan memiliki token dan role
        if ( $response->successful () && isset ( $response[ 'token' ], $response[ 'role' ], $response[ 'name' ] ) )
        {
            $token = $response[ 'token' ];
            $role  = $response[ 'role' ];
            $name  = $response[ 'name' ];

            // Set cookie untuk token dan role lalu redirect ke dashboard
            return redirect ( '/dashboard' )
                ->withCookie ( cookie ( 'token', $token ) )
                ->withCookie ( cookie ( 'role', $role ) )
                ->withCookie ( cookie ( 'name', $name ) );
        }

        // Jika tidak berhasil, kembalikan dengan error
        return redirect ()->back ()->with ( 'error', 'Invalid credentials' );
    }

    public function checkCookie ()
    {
        // Ambil nilai cookie 'token' dan 'role'
        $token = Cookie::get ( 'token' );
        $role  = Cookie::get ( 'role' );
        $name  = Cookie::get ( 'name' );

        // Tampilkan nilai cookie untuk debugging
        dd ( [ 
            'token' => $token,
            'role'  => $role,
            'name'  => $name
        ] );
    }
}
