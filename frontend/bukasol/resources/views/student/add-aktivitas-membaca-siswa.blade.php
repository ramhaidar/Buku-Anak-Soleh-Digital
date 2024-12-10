@extends('student.student-dashboard')

@push('styles')
    <link href="{{ asset('css/dashboardWithTable.css') }}" rel="stylesheet">

    <style>
        .form-check-input:checked {
            background-color: green !important;
        }

        .form-check-input:focus {
            border-color: green !important;
        }
    </style>
@endpush

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Tambah Aktivitas Membaca Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('reading-activity.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nama" name="nama" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="tanggal">Tanggal</label>
                        <input class="form-control rounded-3 border-dark border-2" id="tanggal" name="tanggal" type="date" value="{{ $today }}" required>
                    </div>

                    <!-- Judul Buku Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="judul_buku">Judul Buku</label>
                        <input class="form-control rounded-3 border-dark border-2" id="judul_buku" name="judul_buku" type="text" placeholder="Judul Buku..." required>
                    </div>

                    <!-- Halaman Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="halaman">Halaman</label>
                        <input class="form-control rounded-3 border-dark border-2 mb-2" id="halaman_awal" name="halaman_awal" type="text" placeholder="Halaman Awal Membaca..." required>
                        <input class="form-control rounded-3 border-dark border-2" id="halaman_akhir" name="halaman_akhir" type="text" placeholder="Halaman Akhir Membaca..." required>
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('student.aktivitas-membaca-siswa-table.index') }}">Batal</a>
                        <button class="btn btn-success rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
