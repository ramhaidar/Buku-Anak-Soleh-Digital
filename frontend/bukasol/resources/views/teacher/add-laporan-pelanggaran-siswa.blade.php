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
            <h2 class="text-center mb-4">Tambah Laporan Pelanggaran Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('violation-report.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Nama</label>
                        <input class="form-control rounded-3 border-dark border-2" id="name" name="name" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="date">Tanggal</label>
                        <input class="form-control rounded-3 border-dark border-2" id="date" name="date" type="date" value="{{ $today }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="violation_details">Detail Pelanggaran</label>
                        <textarea class="form-control rounded-3 border-dark border-2" id="violation_details" name="violation_details" rows="3" placeholder="Detail Pelanggaran Siswa..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="consequence">Konsekuensi</label>
                        <textarea class="form-control rounded-3 border-dark border-2" id="consequence" name="consequence" rows="3" placeholder="Konsekuensi..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('teacher.laporan-pelanggaran-siswa.index', ['id' => $studentId]) }}">Batal</a>
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