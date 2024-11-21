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
                    <h2 class="text-center mb-0">Detail Catatan Harian Siswa Abdan Syakuro</h2>
                </div>
            </div>
        </div>
        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="catatanHarianSiswaDetailTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Agenda</th>
                        <th>Catatan</th>
                        <th>Pertanyaan</th>
                        <th>Paraf Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>Apakah An...</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>Apakah An...</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>Apakah An...</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>Apakah An...</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.catatan-harian-siswa-detail-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
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
