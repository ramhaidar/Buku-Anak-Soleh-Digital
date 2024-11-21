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
                    <h2 class="text-center mb-0">Detail Nilai Uji Gerakan Siswa Abdan Syakuro</h2>
                </div>
                <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                    <a class="btn btn-outline-dark rounded-3" href="{{ route('teacher.nilai-uji-gerakan-siswa-add.index') }}">
                        <i class="fa-solid fa-plus me-1"></i>
                        <span class="d-none d-md-inline">Tambah Nilai Uji Gerakan</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="nilaiUjigerakanSiswaDetailTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis gerakan</th>
                        <th>Semester 1</th>
                        <th>Semester 2</th>
                        <th>Paraf Orang tua</th>
                        <th>Paraf Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Wudhu</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Tayammum</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Posisi Berdiri Shalat Qiyam</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Takbiratul Irham</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Ruku</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-sudah">Sudah</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>I’tidal</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Sujud</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Duduk Antara Dua Sujud (Iftirasy)</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Duduk Tahiyat Akhir (Tawarruk)</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Salam</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td>{{ rand(0, 100) / 10 }}</td>
                        <td class="status-belum">Belum</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-gerakan-siswa-edit.index', ['id' => 1]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiGerakanSiswaConfirmationModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @include('teacher.partials.nilai-uji-gerakan-siswa-detail-delete')
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
