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
            <h2 class="text-center mb-4">Tambah Nilai Uji Bacaan Siswa {{ $studentName }}</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('prayer-recitation.store') }}" method="POST">
                    @csrf
                    <!-- Name Input -->
                    <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="text" value="{{ $studentName }}" placeholder="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Jenis Bacaan Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="jenis_bacaan">Jenis Bacaan</label>
                        <input class="form-control rounded-3 border-dark border-2" id="jenis_bacaan" name="jenis_bacaan" type="text" placeholder="Jenis Bacaan..." required>
                    </div>

                    <!-- Nilai Semester 1 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_1">Nilai Semester 1</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nilai_semester_1" name="nilai_semester_1" type="text" placeholder="Nilai Semester 1..." required>
                    </div>

                    <!-- Nilai Semester 2 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_2">Nilai Semester 2</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nilai_semester_2" name="nilai_semester_2" type="text" placeholder="Nilai Semester 2..." required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => $studentId]) }}">Batal</a>
                        <button class="btn btn-success rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === "visible") {
                location.reload(); // Reload the page when it becomes visible
            }
        });
    </script>
@endpush