@extends('layouts.app')

@if ($role == 'SUPERADMIN')
    @section('title', 'Dashboard Admin')
@elseif ($role == 'TEACHER')
    @section('title', 'Dashboard Guru')
@elseif ($role == 'STUDENT')
    @section('title', 'Dashboard Siswa')
@endif

@if ($role == 'SUPERADMIN')
    @section('content')
        @livewire('navbar')
        <div class="container-fluid">
            @livewire('admin-dashboard')
        </div>
    @endsection
@elseif ($role == 'TEACHER')
    @section('content')
        @livewire('navbar')
        <div class="container-fluid">
            @livewire('teacher-dashboard')
        </div>
    @endsection
@elseif ($role == 'STUDENT')
    @section('content')
        @livewire('navbar')
        <div class="container-fluid">
            @livewire('student-dashboard')
        </div>
    @endsection
@endif
