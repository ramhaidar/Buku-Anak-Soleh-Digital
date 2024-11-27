@extends('teacher.teacher-dashboard')

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
            <h2 class="text-center mb-4">Tambah Laporan Pelanggaran Siswa {{ $studentName }}</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="{{ route('violation-report.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-5 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="name" name="name" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="date">Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="date" name="date" type="date" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="violation_details">Detail Pelanggaran</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="violation_details" name="violation_details" rows="3" placeholder="Detail Pelanggaran Siswa..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="consequence">Konsekuensi</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="consequence" name="consequence" rows="3" placeholder="Konsekuensi..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-center pt-3">
                        <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ route('teacher.laporan-pelanggaran-siswa.index', ['id' => $studentId]) }}">Batal</a>
                        <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
