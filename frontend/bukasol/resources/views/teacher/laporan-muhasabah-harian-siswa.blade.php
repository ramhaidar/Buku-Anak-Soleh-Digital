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
                    <h2 class="text-center mb-0">Lembar Laporan Muhasabah Harian {{ $studentName }}</h2>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="laporanMuhasabahHarianSiswaTable">
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === "visible") {
                location.reload(); // Reload the page when it becomes visible
            }
        });
        
        $(document).ready(function() {
            $('#laporanMuhasabahHarianSiswaTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ordering: false,
                searching: false,
                ajax: {
                    url: '{{ route('laporan-muhasabah-siswa.fetchData', ['id' => $studentId]) }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'timeStamp',
                        name: 'timeStamp',
                        title: 'Tanggal',
                        render: function(data, type, row) {
                            if (type === 'display' && data) {
                                const date = new Date(data); // Konversi string ke objek Date
                                const day = String(date.getDate()).padStart(2, '0');
                                const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                                const year = date.getFullYear();
                                return `${day}-${month}-${year}`; // Format dd-mm-yyyy
                            }
                            return data; // Untuk mode selain display, kembalikan data asli
                        }
                    },
                    {
                        data: 'mengaji',
                        name: 'mengaji',
                        title: 'Mengaji',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data ?
                                    '<span class="text-success">Mengaji</span>' :
                                    '<span class="text-danger">Tidak</span>';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'shalatSunnah',
                        name: 'shalatSunnah',
                        title: 'Shalat Sunnah',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data ?
                                    '<span class="text-success">Shalat</span>' :
                                    '<span class="text-danger">Tidak</span>';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'shalatFardhu',
                        name: 'shalatFardhu',
                        title: 'Shalat Fardhu'
                    },
                    {
                        data: 'teacherSign',
                        name: 'teacherSign',
                        title: 'Paraf Guru',
                        render: function(data, type, row) {
                            return `
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        ${data ? 'checked' : ''}
                                        onclick="updateTeacherSign(${row.id}, this.checked)">
                                </div>`;
                        }
                    },
                    {
                        data: 'parentSign',
                        name: 'parentSign',
                        title: 'Paraf Orang Tua',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                return data ?
                                    '<span class="text-success">Sudah</span>' :
                                    '<span class="text-danger">Belum</span>';
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

@push('scripts')
    <script>
        function updateTeacherSign(reportId) {
            const url = `{{ route('muhasabah-report.teacher-sign', ':id') }}`.replace(':id', reportId);

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    window.showAlert(data.success, true, '#laporanMuhasabahHarianSiswaTable');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating teacher sign.');
                });
        }
    </script>
@endpush
