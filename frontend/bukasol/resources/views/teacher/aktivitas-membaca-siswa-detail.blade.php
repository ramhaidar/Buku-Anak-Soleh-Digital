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
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Detail Aktivitas Membaca Siswa Abdan Syakuro</h2>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="aktivitasMembacaSiswaDetailTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul Buku</th>
                        <th>Halaman</th>
                        <th>Paraf Orang Tua</th>
                        <th>Paraf Guru</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Bumi Manusia</td>
                        <td>10-25</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
