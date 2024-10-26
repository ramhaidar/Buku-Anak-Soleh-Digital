@extends('layouts.app')

@section('title', $role)

@if ($role == 'SUPERADMIN')
    @section('content')
        @include('partials.navbar')
        <div class="container-fluid">
            @livewire('admin-dashboard')
        </div>
    @endsection
@elseif ($role == 'TEACHER')
    @section('content')
        @include('partials.navbar')
        <div class="container-fluid">
            @livewire('teacher-dashboard')
        </div>
    @endsection
@elseif ($role == 'STUDENT')
    @section('content')
        @include('partials.navbar')
        <div class="container-fluid">
            @livewire('student-dashboard')
        </div>
    @endsection
@endif
