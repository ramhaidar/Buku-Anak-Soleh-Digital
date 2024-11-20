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
            <h2 class="text-center mb-4">Detail Pelanggaran Siswa Abdan Syakuro</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="#" method="POST">
                    @csrf

                    <!-- NISN Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nisn">NISN</label>
                        <input class="form-control rounded-5 border-dark border-2" id="nisn" name="nisn" type="text" value="123456" readonly>
                    </div>

                    <!-- Nama Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name">Nama</label>
                        <input class="form-control rounded-5 border-dark border-2" id="name" name="name" type="text" value="Abc" readonly>
                    </div>

                    <!-- Kelas Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="class">Kelas</label>
                        <input class="form-control rounded-5 border-dark border-2" id="class" name="class" type="text" value="5-Dzid" readonly>
                    </div>

                    <!-- Tanggal Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="date">Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="date" name="date" type="text" value="11/09/2024" readonly>
                    </div>

                    <!-- Detail Pelanggaran Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="violation_details">Detail Pelanggaran</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="violation_details" name="violation_details" rows="3" readonly>Tidak Membawa Buku</textarea>
                    </div>

                    <!-- Konsekuensi Field -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="consequence">Konsekuensi</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="consequence" name="consequence" rows="3" readonly>Membuat Permintaan Maaf</textarea>
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
