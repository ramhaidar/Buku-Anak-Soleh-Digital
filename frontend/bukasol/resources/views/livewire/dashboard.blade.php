@extends('livewire.layouts.app')

@if ($role == 'SUPERADMIN')
    @section('title', 'Dashboard Admin')
@elseif ($role == 'TEACHER')
    @section('title', 'Dashboard Guru')
@elseif ($role == 'STUDENT')
    @section('title', 'Dashboard Siswa')
@endif

@push('styles')
    <style>
        :root {
            --vh: calc(1dvh * 1px);
            /* Equivalent to 1% of viewport height in pixels */
            --vw: calc(1dvw * 1px);
            /* Equivalent to 1% of viewport width in pixels */
        }

        .content-wrapper {
            flex: 1 0 auto;
            flex-grow: 1;
            padding-top: 0px;
            padding-bottom: 0px;
            overflow-y: auto;
            /* height: calc(100dvh - 10px); */
            min-height: 100%;
            max-width: 100%;
            align-content: center;
            align-items: center;
            justify-content: center;
            justify-items: center;
        }

        .pqrs {
            height: calc(100dvh);
            min-height: 100%;
            /* max-height: calc(100vh); */
            align-content: center;
            align-items: center;
            justify-content: center;
            justify-items: center;
        }
    </style>
@endpush

@if ($role == 'SUPERADMIN')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('admin-dashboard')
        </div>
    @endsection
@elseif ($role == 'TEACHER')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('teacher-dashboard')
        </div>
    @endsection
@elseif ($role == 'STUDENT')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('student-dashboard')
        </div>
    @endsection
@endif
