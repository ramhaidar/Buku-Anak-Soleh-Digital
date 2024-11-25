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
            <h2 class="text-center mb-4">Tambah Catatan Harian Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="{{ route('activity-notes.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-5 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nama" name="nama" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Hari/Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="hari_tanggal">Hari/Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="hari_tanggal" name="hari_tanggal" type="date" value="{{ $today }}">
                    </div>

                    <!-- Agenda Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="agenda">Agenda</label>
                        <input class="form-control rounded-5 border-dark border-2" id="agenda" name="agenda" type="text" placeholder="Masukkan Agenda">
                    </div>

                    <!-- Catatan Harian Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="catatan_harian">Catatan Harian</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="catatan_harian" name="catatan_harian" rows="3" placeholder="Masukkan Catatan Harian"></textarea>
                    </div>

                    <!-- Pertanyaan Orang Tua Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="pertanyaan_orang_tua">Pertanyaan Orang Tua</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="pertanyaan_orang_tua" name="pertanyaan_orang_tua" rows="3" placeholder="Masukkan Pertanyaan dari Orang Tua"></textarea>
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary rounded-5 px-4 w-50 mx-2" href="{{ route('student.catatan-harian-siswa-table.index') }}">Batal</a>
                        <button class="btn btn-success rounded-5 px-4 w-50 mx-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection