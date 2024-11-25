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
            <h2 class="text-center mb-4">Ubah Nilai Uji Gerakan Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="{{ route('prayer-grade.update', ['id' => $gradeId]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input class="form-control rounded-5 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Jenis Gerakan Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="jenis_gerakan">Jenis Gerakan</label>
                        <input class="form-control rounded-5 border-dark border-2" id="jenis_gerakan" name="jenis_gerakan" type="text" value="{{ $motionCategory }}" placeholder="Jenis Gerakan..." required>
                    </div>

                    <!-- Nilai Semester 1 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_1">Nilai Semester 1</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_1" name="nilai_semester_1" type="text" value="{{ $gradeSemester1 }}" placeholder="Nilai Semester 1..." required>
                    </div>

                    <!-- Nilai Semester 2 Input -->
                    <div class="mb-3">
                        <label class="form-label -emibold" for="nilai_semester_2">Nilai Semester 2</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_2" name="nilai_semester_2" type="text" value="{{ $gradeSemester2 }}" placeholder="Nilai Semester 2..." required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center pt-3">
                        <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ route('teacher.nilai-uji-gerakan-siswa-detail.index', ['id' => $studentId]) }}">Batal</a>
                        <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
