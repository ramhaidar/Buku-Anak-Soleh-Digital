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
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="nisn">{{ $student->nisn }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="name">{{ $student->user->name }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class_name">Kelas</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="class_name">{{ $student->class_name }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="username">Username</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="username">{{ $student->user->username }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="password">{{ $password }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_name">Nama Orang Tua</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="parent_name">{{ $student->parent_name }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_code">Kode Orang Tua</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="parent_code">{{ $student->parent_code }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_nip">NIP Wali Kelas</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="teacher_nip">{{ $student->teacher->nip }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_name">Nama Wali Kelas</label>
                    <div class="form-control rounded-5 border-dark bg-black text-white" id="teacher_name">{{ $student->teacher->user->name }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
