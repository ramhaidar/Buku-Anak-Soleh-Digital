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
            <h2 class="text-center mb-4">Tambah Nilai Uji Gerakan Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('prayer-grade.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Name Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="text" value="{{ $studentName }}" placeholder="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Jenis Gerakan Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="jenis_gerakan">Jenis Gerakan</label>
                        <input class="form-control rounded-3 border-dark border-2" id="jenis_gerakan" name="jenis_gerakan" type="text" placeholder="Jenis Gerakan..." required>
                    </div>

                    <!-- Nilai Semester 1 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_1">Nilai Semester 1</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nilai_semester_1" name="nilai_semester_1" type="text" value=0 placeholder="Nilai Semester 1..." required>
                    </div>

                    <!-- Nilai Semester 2 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_2">Nilai Semester 2</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nilai_semester_2" name="nilai_semester_2" type="text" value=0 placeholder="Nilai Semester 2..." required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-detail.index', ['id' => $studentId]) }}">Batal</a>
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