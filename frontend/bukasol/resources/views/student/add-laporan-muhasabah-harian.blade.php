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
            <div class="p-4 rounded w-75">
                <form action="{{ route('muhasabah-report.store') }}" method="POST">
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

                    <!-- Mengaji Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="mengaji">Mengaji</label>
                        <input class="form-control rounded-3 border-dark border-2 mb-2" id="surah" name="surah" type="text" placeholder="Surah...">
                        <input class="form-control rounded-3 border-dark border-2 mb-2" id="ayat_awal" name="ayat_awal" type="text" placeholder="Ayat Awal Mengaji...">
                        <input class="form-control rounded-3 border-dark border-2" id="ayat_akhir" name="ayat_akhir" type="text" placeholder="Ayat Akhir Mengaji...">
                    </div>

                    <!-- Shalat Sunnah Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="shalat_sunnah">Shalat Sunnah</label>
                        <select class="form-select rounded-3 border-dark border-2" id="shalat_sunnah" name="shalat_sunnah" required>
                            <option value="" disabled selected>Apakah Shalat Sunnah?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Shalat Fardhu Inputs -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Shalat Fardhu</label>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="subuh" name="subuh" required>
                            <option value="" disabled selected>Apakah Shalat Subuh?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="dzuhur" name="dzuhur" required>
                            <option value="" disabled selected>Apakah Shalat Dzuhur?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="ashar" name="ashar" required>
                            <option value="" disabled selected>Apakah Shalat Ashar?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="maghrib" name="maghrib" required>
                            <option value="" disabled selected>Apakah Shalat Maghrib?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2" id="isya" name="isya" required>
                            <option value="" disabled selected>Apakah Shalat Isya?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('student.laporan-muhasabah-siswa-table.index') }}">Batal</a>
                        <button class="btn btn-success rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener("pageshow", function(event) {
            if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                // Reload the page when navigating forward or back in history
                location.reload();
            }
        });
    </script>
@endpush