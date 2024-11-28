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
                    <h2 class="text-center mb-0">Lembar Laporan Muhasabah Harian Siswa</h2>
                </div>
            </div>
        </div>

        <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
            <a class="btn btn-outline-dark rounded-3 me-2" href="{{ route('muhasabah-report.convert-pdf', [ 'id' => $studentId ]) }}">
                <i class="fa-solid fa-file-contract me-1"></i>
                <span class="d-none d-md-inline">Export Laporan Muhasabah</span>
            </a>
            <a class="btn btn-outline-dark rounded-3" href="{{ route('student.laporan-muhasabah-siswa-add.index') }}">
                <i class="fa-solid fa-plus me-1"></i>
                <span class="d-none d-md-inline">Tambah Laporan Muhasabah</span>
            </a>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="laporanMuhasabahHarianSiswaTable">
            </table>
        </div>

        @include('student.partials.modal-kode-unik-paraf-orang-tua-muhasabah-report')
        @include('student.partials.laporan-muhasabah-harian-delete')

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#laporanMuhasabahHarianSiswaTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: {
                    url: '{{ route('siswa.laporan-muhasabah.fetchData') }}',
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
                        data: 'mengaji',
                        name: 'mengaji',
                        title: 'Mengaji',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data
                                    ? '<span class="text-success">Mengaji</span>'
                                    : '<span class="text-danger">Tidak</span>';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'sholatSunnah',
                        name: 'sholatSunnah',
                        title: 'Sholat Sunnah',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data
                                    ? '<span class="text-success">Sholat</span>'
                                    : '<span class="text-danger">Tidak</span>';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'sholatFardhu',
                        name: 'sholatFardhu',
                        title: 'Sholat Fardhu'
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