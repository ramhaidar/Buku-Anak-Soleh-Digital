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
                    <h2 class="text-center mb-0">Lembar Catatan Aktivitas Harian Siswa {{ $studentName }}</h2>
                </div>
            </div>
        </div>
        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="catatanHarianSiswaDetailTable">
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#catatanHarianSiswaDetailTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                ajax: {
                    url: '{{ route('catatan-harian-detail.fetchData', ['id' => $studentId]) }}',
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
                        data: 'agenda',
                        name: 'agenda',
                        title: 'Agenda'
                    },
                    {
                        data: 'content',
                        name: 'content',
                        title: 'Catatan',
                        render: function (data, type, row) {
                            const maxLength = 50;
                            if (data && data.length > maxLength) {
                                return data.substring(0, maxLength) + '...';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'parentQuestion',
                        name: 'parentQuestion',
                        title: 'Pertanyaan'
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
        function updateTeacherSign(noteId) {
            const url = `{{ route('activity-notes.teacher-sign', ':id') }}`.replace(':id', noteId);

            fetch(url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                window.showAlert(data.success, true, '#catatanHarianSiswaDetailTable');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating teacher sign.');
            });
        }
    </script>
@endpush