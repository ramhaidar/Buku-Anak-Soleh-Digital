@extends('layouts.app')
@section('title', $role)

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
