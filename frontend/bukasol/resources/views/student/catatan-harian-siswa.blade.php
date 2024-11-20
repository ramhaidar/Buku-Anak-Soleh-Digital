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

        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Catatan Harian Siswa</h2>
                </div>
                <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                    <button class="btn btn-outline-dark rounded-3 me-2">
                        <i class="fa-solid fa-file-contract me-1"></i>
                        <span class="d-none d-md-inline">Export Catatan</span>
                    </button>
                    <a class="btn btn-outline-dark rounded-3" href="{{ route('student.catatan-harian-siswa-add.index', ['id' => 1]) }}">
                        <i class="fa-solid fa-plus me-1"></i>
                        <span class="d-none d-md-inline">Tambah Catatan</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="catatanHarianSiswaTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Agenda</th>
                        <th>Catatan</th>
                        <th>Balasan Guru</th>
                        <th>Paraf Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-sudah">Ada</span></td>
                        <td><span class="status-sudah">Sudah</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-sudah">Ada</span></td>
                        <td><span class="status-belum">Belum</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-sudah">Sudah</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-sudah">Ada</span></td>
                        <td><span class="status-belum">Belum</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-sudah">Sudah</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-sudah">Sudah</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-belum">Belum</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-sudah">Ada</span></td>
                        <td><span class="status-sudah">Sudah</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-belum">Belum</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Membaca Buku</td>
                        <td>Hari ini saya.....</td>
                        <td><span class="status-belum">Tidak Ada</span></td>
                        <td><span class="status-belum">Belum</span></td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('student.catatan-harian-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteCatatanHarianSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @include('student.partials.catatan-harian-siswa-delete')
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
