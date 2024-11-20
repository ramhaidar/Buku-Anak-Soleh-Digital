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

        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Nilai Uji Bacaan Siswa</h2>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="nilaiUjiBacaanSiswaTable">
                <thead class="text-center">
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Semester 1</th>
                        <th>Semester 2</th>
                        <th>Paraf Orang Tua</th>
                        <th>Paraf Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>Abc</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td class="text-success">Sudah</td>
                        <td class="text-success">Sudah</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123457</td>
                        <td>Abc</td>
                        <td>0.0</td>
                        <td>0.0</td>
                        <td class="text-danger">Belum</td>
                        <td class="text-danger">Belum</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123458</td>
                        <td>Def</td>
                        <td>10.0</td>
                        <td>20.0</td>
                        <td class="text-success">Sudah</td>
                        <td class="text-success">Sudah</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123459</td>
                        <td>Ghi</td>
                        <td>15.5</td>
                        <td>18.0</td>
                        <td class="text-danger">Belum</td>
                        <td class="text-danger">Belum</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123460</td>
                        <td>Jkl</td>
                        <td>5.0</td>
                        <td>7.0</td>
                        <td class="text-success">Sudah</td>
                        <td class="text-danger">Belum</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123461</td>
                        <td>Mno</td>
                        <td>12.0</td>
                        <td>14.0</td>
                        <td class="text-danger">Belum</td>
                        <td class="text-success">Sudah</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>123462</td>
                        <td>Pqr</td>
                        <td>8.5</td>
                        <td>9.0</td>
                        <td class="text-success">Sudah</td>
                        <td class="text-success">Sudah</td>
                        <td>
                            <div class="container-fluid w-100">
                                <div class="d-flex justify-content-center w-100">
                                    <!-- Detail Button to Trigger Detail Modal -->
                                    <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => 1]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <!-- Delete Button to Trigger Confirmation Modal -->
                                    <button class="btn btn-sm btn-success py-2">
                                        <i class="fa fa-file-export"></i>
                                    </button>
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
