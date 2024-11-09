@extends('livewire.layouts.app')

@if ($role == 'Admin')
    @section('title', 'Dashboard Admin')
@elseif ($role == 'Teacher')
    @section('title', 'Dashboard Guru')
@elseif ($role == 'Student')
    @section('title', 'Dashboard Siswa')
@endif

@push('styles')
    <!-- SweetAlert2 11.14.5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.min.css" rel="stylesheet" integrity="sha512-Xxs33QtURTKyRJi+DQ7EKwWzxpDlLSqjC7VYwbdWW9zdhrewgsHoim8DclqjqMlsMeiqgAi51+zuamxdEP2v1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

@if ($role == 'Admin')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('admin-dashboard')
        </div>
    @endsection
@elseif ($role == 'Teacher')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('teacher-dashboard')
        </div>
    @endsection
@elseif ($role == 'Student')
    @section('content')
        @livewire('pre-run')
        @livewire('navbar')
        <div class="py-2 flex-grow-1 align-content-center justify-content-center">
            @livewire('student-dashboard')
        </div>
    @endsection
@endif

@push('scripts')
    <!-- SweetAlert2 11.14.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.min.js" integrity="sha512-JCDnPKShC1tVU4pNu5mhCEt6KWmHf0XPojB0OILRMkr89Eq9BHeBP+54oUlsmj8R5oWqmJstG1QoY6HkkKeUAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert2 Error Notification -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- SweetAlert2 Success Notification -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endpush
