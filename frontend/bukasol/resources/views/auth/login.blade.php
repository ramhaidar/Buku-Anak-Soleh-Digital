@extends('livewire.layouts.app')

@section('title', 'Halaman Login')

@push('styles')
    <style>
        body {
            background-color: #527900;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            min-height: 100vh;
        }

        .login-box {
            width: 100%;
            min-width: 450px;
            max-width: 500px;
            background-color: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1)
        }

        .logo-container img {
            width: 100px;
            margin-bottom: 20px
        }

        h2 {
            padding: 10px;
            border-radius: 8px;
            color: #000000;
            margin-bottom: 25px;
            font-size: 16px
        }

        .form-label {
            color: #000000;
            text-align: left
        }

        .form-control {
            background-color: #ffffff;
            border: 1px solid #6c757d;
            color: #000000
        }

        .form-control::placeholder {
            color: #aaaaaa;
            opacity: 1
        }

        .form-control:focus {
            border-color: #6236FF;
            box-shadow: none
        }

        .form-check-label {
            color: #fff
        }

        .forgot-password {
            color: #A6A6A6;
            font-size: 12px;
            display: block;
            text-decoration: none;
            margin-top: 10px
        }

        .forgot-password:hover {
            color: #E4E4E7
        }

        #LoginLogo {
            border-radius: 50%;
            margin: 3%;
            width: 200px;
            height: 200px;
            object-fit: cover
        }

        @media (max-width:768px) {
            .login-box {
                padding: 20px
            }
        }

        @media (max-width:576px) {

            .btn-register,
            .btn-login {
                width: 100%;
                margin-top: 10px
            }

            .button-group {
                flex-direction: column
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid h-100" id="LoginPage" style="align-content: center">
        <div class="container-fluid align-items-center">
            <div class="align-items-center align-content-center d-flex justify-content-center container-fluid">
                <div class="login-box">
                    <div class="logo-container container-fluid text-center px-0 py-0"><img id="LoginLogo" src="{{ asset('Logo.png') }}" alt="Logo"></div>
                    <h2 class="text-center rounded-1 fw-light pt-0 mt-2">Buku Anak Soleh Digital</h2>
                    <form action="{{ route('login.post') }}" method="POST">@csrf <div class="mb-3"><input class="form-control border border-4 rounded-3" id="username" name="username" type="text" placeholder="Username" required autocomplete=""></div>
                        <div class="mb-3"><input class="form-control border border-4 rounded-3" id="password" name="password" type="password" placeholder="Password" required autocomplete=""></div>
                        <div class="d-flex justify-content-between button-group gap-2 pt-2 px-0 py-0 mx-0 my-0"><button class="container-fluid btn btn-secondary fw-medium" type="submit">Login</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
