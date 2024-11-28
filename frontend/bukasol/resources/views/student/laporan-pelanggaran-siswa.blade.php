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
                    <h2 class="text-center mb-0">Lembar Laporan Pelanggaran Siswa</h2>
                </div>
            </div>
        </div>

        <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
            <a class="btn btn-outline-dark rounded-3" href="{{ route('violation-report.convert-pdf', [ 'id' => $studentId ]) }}">
                <i class="fa-solid fa-file-contract me-1"></i>
                <span class="d-none d-md-inline">Export Laporan Pelanggaran</span>
            </a>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="laporanPelanggaranSiswaTable">
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#laporanPelanggaranSiswaTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: {
                    url: '{{ route('siswa.laporan-pelanggaran-siswa.fetchData') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [
                    {
                        data: 'timeStamp',
                        name: 'timeStamp',
                        title: 'Tanggal'
                    },
                    {
                        data: 'violationDetails',
                        name: 'violationDetails',
                        title: 'Pelanggaran',
                        render: function (data, type, row) {
                            const maxLength = 50;
                            if (data && data.length > maxLength) {
                                return data.substring(0, maxLength) + '...';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'consequence',
                        name: 'consequence',
                        title: 'Konskuensi',
                        render: function (data, type, row) {
                            const maxLength = 50;
                            if (data && data.length > maxLength) {
                                return data.substring(0, maxLength) + '...';
                            }
                            return data;
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
                    },
                    {
                        data: 'action',
                        name: 'action',
                        title: 'Actions'
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