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
@endpush

<div class="p-0 m-0" id="dashboard">
    @if ($role == 'Admin')
        @section('content')
            @livewire('layouts.pre-run')
            @livewire('partials.navbar')
            <div class="pt-2 pb-4 flex-grow-1 d-flex align-content-center justify-content-center">
                @livewire('admin.admin-dashboard')
            </div>
        @endsection
    @elseif ($role == 'Teacher')
        @section('content')
            @livewire('layouts.pre-run')
            @livewire('partials.navbar')
            <div class="py-2 flex-grow-1 align-content-center justify-content-center">
                @livewire('teacher.teacher-dashboard')
            </div>
        @endsection
    @elseif ($role == 'Student')
        @section('content')
            @livewire('layouts.pre-run')
            @livewire('partials.navbar')
            <div class="py-2 flex-grow-1 align-content-center justify-content-center">
                @livewire('teacher.student-dashboard')
            </div>
        @endsection
    @endif
</div>

@push('scripts')
    <!-- SweetAlert2 11.14.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.min.js" integrity="sha512-JCDnPKShC1tVU4pNu5mhCEt6KWmHf0XPojB0OILRMkr89Eq9BHeBP+54oUlsmj8R5oWqmJstG1QoY6HkkKeUAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert2 Error Notification for Validation Errors -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: '{!! implode('<br>', $errors->all()) !!}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

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

    <!-- ShowAlert Function -->
    <script>
        // Function to display SweetAlert2 alert globally and reload the specified table
        window.showAlert = function(message, isSuccess = true, tableId = null) {
            Swal.fire({
                icon: isSuccess ? 'success' : 'error',
                title: isSuccess ? 'Success' : 'Error',
                text: message,
                target: document.getElementById('dashboard'), // Set the target to #footer
                position: 'center', // Position it in the center of the target
                showConfirmButton: true,
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary', // Apply Bootstrap styling to the confirm button
                },
                backdrop: true, // Enable backdrop for visual emphasis
                allowOutsideClick: true, // Allow dismissing the alert by clicking outside
                didClose: () => {
                    // If a table ID is provided, reload it using DataTable API
                    if (tableId) {
                        $(tableId).DataTable().ajax.reload();
                    }
                }
            });
        }
    </script>
@endpush
