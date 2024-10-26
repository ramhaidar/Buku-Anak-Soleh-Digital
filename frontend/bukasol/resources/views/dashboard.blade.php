@extends('layouts.app')

@section('title', $role)

@if ($role == 'SUPERADMIN')
    @section('content')
        @include('partials.navbar')

        <div class="container-fluid">
            @yield('dashboard_content')
        </div>
    @endsection
@elseif ($role == 'TEACHER')

@elseif ($role == 'STUDENT')

@endif
