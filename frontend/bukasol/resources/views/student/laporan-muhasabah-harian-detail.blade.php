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
            <h2 class="text-center mb-4">Detail Laporan Muhasabah Harian Siswa {{ $muhasabahReport->student->user->name }}</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form>
                    <!-- Hari/Tanggal -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="hari_tanggal">Hari/Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="hari_tanggal" type="text" value="{{ $muhasabahReport->time_stamp }}" readonly>
                    </div>

                    <!-- Mengaji -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Mengaji</label>
                        <input class="form-control rounded-5 border-dark border-2" id="mengaji" type="text" value="{{ $surahName }}" readonly>
                        <input class="form-control mt-2 rounded-5 border-dark border-2" id="ayat" type="text" value="{{ $surahAyat }}" readonly>
                    </div>

                    <!-- Sholat Sunnah -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sholat Sunnah</label>
                        <div class="p-2 rounded-5 text-white text-center" style="background-color: red;">Tidak Shalat</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Shalat Sunnah</label>
                        <div class="p-2 rounded-5 text-white text-center" style="{{ $muhasabahReport->sunnah_pray ? 'background-color: green;' : 'background-color: red;' }}">{{ $muhasabahReport->sunnah_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                    </div>

                    <!-- Sholat Fardhu -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="sholat_fardhu">Sholat Fardhu</label>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->subuh_pray ? 'background-color: green;' : 'background-color: red;' }}">Subuh - {{ $muhasabahReport->subuh_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->dzuhur_pray ? 'background-color: green;' : 'background-color: red;' }}">Dzuhur - {{ $muhasabahReport->dzuhur_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->ashar_pray ? 'background-color: green;' : 'background-color: red;' }}">Ashar - {{ $muhasabahReport->ashar_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->maghrib_pray ? 'background-color: green;' : 'background-color: red;' }}">Maghrib - {{ $muhasabahReport->maghrib_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->isya_pray ? 'background-color: green;' : 'background-color: red;' }}">Isya - {{ $muhasabahReport->isya_pray ? 'Shalat' : 'Tidak Shalat' }}</div>
                    </div>

                    <!-- Paraf -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="paraf">Paraf</label>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->teacher_sign ? 'background-color: green;' : 'background-color: red;' }}">Guru - {{ $muhasabahReport->teacher_sign ? 'Sudah' : 'Belum' }}</div>
                        <div class="p-2 rounded-5 text-white text-center mb-2" style="{{ $muhasabahReport->parent_sign ? 'background-color: green;' : 'background-color: red;' }}">Orang Tua - {{ $muhasabahReport->parent_sign ? 'Sudah' : 'Belum' }}</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection