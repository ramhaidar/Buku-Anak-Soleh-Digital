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
            <h2 class="text-center mb-4">Tambah Laporan Bacaan Juz 29</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="#" method="POST">
                    @csrf

                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nama" name="nama" type="text" value="Abc" readonly disabled>
                    </div>

                    <!-- Juz Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="juz">Juz</label>
                        <input class="form-control rounded-5 border-dark border-2" id="juz" name="juz" type="text" value="1" readonly disabled>
                    </div>

                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="tanggal">Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="tanggal" name="tanggal" type="date" value="2024-11-09">
                    </div>

                    <!-- Surah Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="surah">Surah</label>
                        <select class="form-select rounded-5 border-dark border-2" id="surah" name="surah">
                            <option value="" disabled selected>Surah...</option>
                            <option value="Al-Baqarah">Al-Baqarah</option>
                            <option value="Ali-Imran">Ali-Imran</option>
                            <option value="An-Nisa">An-Nisa</option>
                        </select>
                    </div>

                    <!-- Ayat Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="ayat">Ayat</label>
                        <input class="form-control rounded-5 border-dark border-2" id="ayat" name="ayat" type="text" placeholder="Ayat...">
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary rounded-5 px-4 w-50 mx-2" href="{{ url()->previous() }}">Batal</a>
                        <button class="btn btn-success rounded-5 px-4 w-50 mx-2" type="submit">Tambah</button>
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
