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
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Lembar Nilai Uji Gerakan</h2>
                </div>
            </div>
        </div>

        <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
            <a class="btn btn-outline-dark rounded-3" href="{{ route('prayer-recitation-grade.convert-pdf', ['id' => $studentId]) }}">
                <i class="fa-solid fa-file-export me-1"></i>
                <span class="d-none d-md-inline">Export Nilai</span>
            </a>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="nilaiUjiBacaanSiswaDetailTable">
            </table>
        </div>

        @include('student.partials.modal-kode-unik-paraf-orang-tua-prayer-recitation-grade')
    </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#nilaiUjiBacaanSiswaDetailTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: {
                    url: '{{ route('siswa.nilai_uji_bacaan.fetchData') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'readingCategory',
                        name: 'readingCategory',
                        title: 'Jenis Bacaan'
                    },
                    {
                        data: 'gradeSemester1',
                        name: 'gradeSemester1',
                        title: 'Semester 1'
                    },
                    {
                        data: 'gradeSemester2',
                        name: 'gradeSemester2',
                        title: 'Semester 2'
                    },
                    {
                        data: 'parentSign',
                        name: 'parentSign',
                        title: 'Paraf Orang Tua',
                        render: function(data, type, row) {
                            return `
                                <div class="form-check form-switch">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        ${data ? 'checked' : ''}
                                        onclick="showParentCodeModal(${row.id})">
                                </div>`;
                        }
                    },
                    {
                        data: 'teacherSign',
                        name: 'teacherSign',
                        title: 'Paraf Guru',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data
                                    ? '<span class="text-success">Sudah</span>'
                                    : '<span class="text-danger">Belum</span>';
                            }
                            return data;
                        }
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
