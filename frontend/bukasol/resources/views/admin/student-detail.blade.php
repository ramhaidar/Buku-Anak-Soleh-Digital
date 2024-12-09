@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Detail Akun Siswa</h2>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nisn">NISN</label>
                    <input class="form-control rounded-3" id="nisn" type="text" value="{{ $student->nisn }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <input class="form-control rounded-3" id="name" type="text" value="{{ $student->user->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class_name">Kelas</label>
                    <input class="form-control rounded-3" id="class_name" type="text" value="{{ $student->class_name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="username">Username</label>
                    <input class="form-control rounded-3" id="username" type="text" value="{{ $student->user->username }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <input class="form-control rounded-3" id="password" type="text" value="{{ $password }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_name">Nama Orang Tua</label>
                    <input class="form-control rounded-3" id="parent_name" type="text" value="{{ $student->parent_name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_code">Kode Orang Tua</label>
                    <input class="form-control rounded-3" id="parent_code" type="text" value="{{ $student->parent_code }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_nip">NIP Wali Kelas</label>
                    <input class="form-control rounded-3" id="teacher_nip" type="text" value="{{ $student->teacher->nip }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_name">Nama Wali Kelas</label>
                    <input class="form-control rounded-3" id="teacher_name" type="text" value="{{ $student->teacher->user->name }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
