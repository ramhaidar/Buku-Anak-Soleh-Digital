@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Tambah Akun Guru</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                {{-- <form action="{{ route('teacher.store') }}" method="POST"> --}}
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nip">NIP</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nip" name="nip" type="text" placeholder="NIP....." required>
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

                    <div class="d-flex justify-content-between pt-3">
                        <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ url()->previous() }}">Batal</a>
                        <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
