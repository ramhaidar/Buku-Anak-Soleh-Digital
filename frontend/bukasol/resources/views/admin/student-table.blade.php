@extends('admin.admin-dashboard')

@push('styles')
    <!-- DataTables 2.1.8 -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        #studentTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #studentTable tbody td {
            text-align: left;
            vertical-align: middle;
        }

        #studentTable tbody td:last-child {
            text-align: center;
        }

        td,
        th {
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            width: 1%;
        }
    </style>
@endpush

@section('content_3')
    <div class="p-0 m-0">

        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Akun Siswa</h2>
                </div>
                <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                    <button class="btn btn-outline-dark rounded-3 me-2">
                        <i class="fa-solid fa-file-contract me-1"></i>
                        <span class="d-none d-md-inline">Export Akun</span>
                    </button>
                    <button class="btn btn-outline-dark rounded-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        <i class="fa-solid fa-plus me-1"></i>
                        <span class="d-none d-md-inline">Tambah Siswa</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="studentTable">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables akan mengisi body tabel secara otomatis dengan data server-side -->
                </tbody>
            </table>
        </div>

        @include('admin.partials.modal-add-student')
        @include('admin.partials.modal-delete-student')
    </div>
@endsection

@push('scripts')
    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: {
                    url: '{{ route('student.fetchData') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'nisn',
                        name: 'nisn'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'class_name',
                        name: 'class_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
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
    </script>
@endpush
