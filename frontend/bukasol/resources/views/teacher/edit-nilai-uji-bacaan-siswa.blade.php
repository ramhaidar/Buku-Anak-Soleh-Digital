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
            <h2 class="text-center mb-4">Ubah Nilai Uji Bacaan Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="#" method="POST">
                    @csrf

                    <!-- Jenis Bacaan Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="jenis_bacaan">Jenis Bacaan</label>
                        <input class="form-control rounded-5 border-dark border-2" id="jenis_bacaan" name="jenis_bacaan" type="text" value="Adzan" placeholder="Jenis Bacaan..." readonly disabledrequired>
                    </div>

                    <!-- Nilai Semester 1 Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nilai_semester_1">Nilai Semester 1</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_1" name="nilai_semester_1" type="text" value="7.0" placeholder="Nilai Semester 1..." required>
                    </div>

                    <!-- Nilai Semester 2 Input -->
                    <div class="mb-3">
                        <label class="form-label -emibold" for="nilai_semester_2">Nilai Semester 2</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_2" name="nilai_semester_2" type="text" value="7.5" placeholder="Nilai Semester 2..." required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center pt-3">
                        <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ url()->previous() }}">Batal</a>
                        <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Loop through each table element on the page
            $('table').each(function() {
                // Check if DataTable is already initialized for the current table
                if ($.fn.DataTable.isDataTable(this)) {
                    $(this).DataTable().destroy();
                }

                // Initialize DataTable for the current table
                $(this).DataTable({
                    info: true,
                    ordering: true,
                    order: [], // No default order
                    language: {
                        paginate: {
                            first: '<i class="bi bi-chevron-double-left container-fluid"></i>',
                            previous: '<i class="bi bi-chevron-left container-fluid"></i>',
                            next: '<i class="bi bi-chevron-right container-fluid"></i>',
                            last: '<i class="bi bi-chevron-double-right container-fluid"></i>'
                        }
                    }
                });
            });
        });
    </script>
@endpush
