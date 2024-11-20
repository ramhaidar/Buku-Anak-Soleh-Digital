@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Detail Akun Guru</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <!-- Start of the form -->

                <!-- NIP -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nip">NIP</label>
                    <div class="form-control bg-black text-white rounded-pill border-0" id="nip">{{ $teacher->nip }}</div>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <div class="form-control bg-black text-white rounded-pill border-0" id="name">{{ $teacher->user->name }}</div>
                </div>

                <!-- Kelas -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class_name">Kelas</label>
                    <div class="form-control bg-black text-white rounded-pill border-0" id="class_name">{{ $teacher->class_name }}</div>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="username">Username</label>
                    <div class="form-control bg-black text-white rounded-pill border-0" id="username">{{ $teacher->user->username }}</div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <div class="form-control bg-black text-white rounded-pill border-0" id="password">{{ $teacher->user->password }}</div>
                </div>

                <!-- End of the form -->
            </div>
        </div>
    </div>
@endsection
