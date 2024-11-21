@extends('layouts.app')

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

    {{-- <style>
        /* For devices with height <= 600px */
        @media (max-height: 600px) {
            .mobile {
                margin-top: 40vh;
                /* Adjust as per your requirement */
            }
        }

        /* For devices with height between 601px and 667px */
        @media (min-height: 601px) and (max-height: 667px) {
            .mobile {
                margin-top: 30vh;
            }
        }

        /* For devices with height between 668px and 740px */
        @media (min-height: 668px) and (max-height: 740px) {
            .mobile {
                margin-top: 20vh;
            }
        }

        /* For devices with height between 741px and 884px */
        @media (min-height: 741px) and (max-height: 884px) {
            .mobile {
                margin-top: 10vh;
            }
        }

        /* Optional: Default styles for devices with height > 884px */
        @media (min-height: 885px and (max-height: 900px)) {
            .mobile {
                margin-top: 5vh;
            }
        }

        @media (min-height: 901px) {
            .mobile {
                margin-top: 25dvh;
            }
        }
    </style> --}}
@endpush

<div class="p-0 m-0" id="dashboard">
    @if ($role == 'Admin')
        @include('partials.navbar')
        @section('content')
            <div class="mx-2 py-3 px-2 flex-grow-1 align-content-center justify-content-center mobile" style="margin-top: 80px; margin-bottom: 40px; overflow-y: auto; overflow-x: hidden">
                @yield('content_2')
            </div>
        @endsection
    @elseif ($role == 'Teacher')
        @section('content')
            @include('partials.navbar')
            <div class="mx-2 py-3 px-2 flex-grow-1 align-content-center justify-content-center mobile" style="margin-top: 80px; margin-bottom: 40px; overflow-y: auto; overflow-x: hidden">
                @yield('content_2')
            </div>
        @endsection
    @elseif ($role == 'Student')
        @section('content')
            @include('partials.navbar')
            <div class="mx-2 py-3 px-2 flex-grow-1 align-content-center justify-content-center mobile" style="margin-top: 80px; margin-bottom: 40px; overflow-y: auto; overflow-x: hidden">
                @yield('content_2')
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function showModal(checkbox) {
                // Check if the checkbox is unchecked
                if (checkbox.checked) {
                    // Show the modal if checkbox is not checked
                    var myModal = new bootstrap.Modal(document.getElementById('kodeUnikModal'));
                    myModal.show();
                }
            }

            // Expose showModal function globally if needed
            window.showModal = showModal;
        });
    </script>
@endpush
