@php
    $layout = match ($role) {
        'Teacher' => 'teacher.teacher-dashboard',
        'Student' => 'student.student-dashboard',
        'Admin' => 'admin.admin-dashboard',
    };
@endphp

@extends($layout)

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-start ps-4 mb-4">Ganti Password Akun</h2>
        </div>
        <div class="d-flex justify-content-start align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('change-password') }}" method="POST">
                    @csrf

                    <!-- Hidden username field -->
                    <input name="username" type="text" value="" aria-hidden="true" autocomplete="username" hidden>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="current_password">Password Sekarang</label>
                        <input class="form-control rounded-5 border-dark border-2" id="current_password" name="current_password" type="password" required autocomplete="current-password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="new_password">Password Baru</label>
                        <input class="form-control rounded-5 border-dark border-2" id="new_password" name="new_password" type="password" required autocomplete="new-password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <input class="form-control rounded-5 border-dark border-2" id="new_password_confirmation" name="new_password_confirmation" type="password" required autocomplete="new-password">
                    </div>

                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <button class="btn btn-success rounded-5 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Ganti</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
