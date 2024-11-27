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
            <h2 class="text-center mb-4">Tambah Laporan Muhasabah Harian Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="{{ route('muhasabah-report.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-5 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nama" name="nama" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="tanggal">Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="tanggal" name="tanggal" type="date" value="{{ $today }}">
                    </div>

                    <!-- Mengaji Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="mengaji">Mengaji</label>
                        <input class="form-control rounded-5 border-dark border-2 mb-2" id="surah" name="surah" type="text" placeholder="Surah...">
                        <input class="form-control rounded-5 border-dark border-2" id="ayat" name="ayat" type="text" placeholder="Ayat...">
                    </div>

                    <!-- Sholat Sunnah Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="sholat_sunnah">Sholat Sunnah</label>
                        <select class="form-select rounded-5 border-dark border-2" id="sholat_sunnah" name="sholat_sunnah">
                            <option value="" disabled selected>Apakah Sholat Sunnah?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Sholat Fardhu Inputs -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sholat Fardhu</label>
                        <select class="form-select rounded-5 border-dark border-2 mb-2" id="subuh" name="subuh">
                            <option value="" disabled selected>Apakah Sholat Subuh?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-5 border-dark border-2 mb-2" id="dzuhur" name="dzuhur">
                            <option value="" disabled selected>Apakah Sholat Dzuhur?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-5 border-dark border-2 mb-2" id="ashar" name="ashar">
                            <option value="" disabled selected>Apakah Sholat Ashar?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-5 border-dark border-2 mb-2" id="maghrib" name="maghrib">
                            <option value="" disabled selected>Apakah Sholat Maghrib?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-5 border-dark border-2" id="isya" name="isya">
                            <option value="" disabled selected>Apakah Sholat Isya?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary rounded-5 px-4 w-50 mx-2" href="{{ route('student.laporan-muhasabah-siswa-table.index') }}">Batal</a>
                        <button class="btn btn-success rounded-5 px-4 w-50 mx-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection