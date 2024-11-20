@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Tambah Akun Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                {{-- <form action="{{ route('student.store') }}" method="POST"> --}}
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nisn">NISN</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nisn" name="nisn" type="text" placeholder="NISN....." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="name" name="name" type="text" placeholder="Nama....." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="class_name">Kelas</label>
                        <input class="form-control rounded-5 border-dark border-2" id="class_name" name="class_name" type="text" placeholder="Kelas....." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="username">Username</label>
                        <input class="form-control rounded-5 border-dark border-2" id="username" name="username" type="text" placeholder="Username....." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="parent_name">Nama Orang Tua</label>
                        <input class="form-control rounded-5 border-dark border-2" id="parent_name" name="parent_name" type="text" placeholder="Nama Orang Tua....." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="teacher_id">Wali Kelas</label>
                        <select class="form-select rounded-5 border-dark border-2" id="teacher_id" name="teacher_id" required>
                            <option value="" disabled selected>Pilih Wali kelas</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between pt-3">
                        <button class="btn btn-secondary mx-1 w-50 rounded-5" type="reset">Reset</button>
                        <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
