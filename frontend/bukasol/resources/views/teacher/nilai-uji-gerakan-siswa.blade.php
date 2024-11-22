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
                    <h2 class="text-center mb-0">Lembar Nilai Uji Gerakan Siswa</h2>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="nilaiUjiGerakanSiswaTable">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Semester 1</th>
                        <th>Semester 2</th>
                        <th>Paraf Orang Tua</th>
                        <th>Paraf Guru</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#nilaiUjiGerakanSiswaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('teacher.nilai-uji-gerakan-siswa-table.index', ['className' => $className ?? auth()->user()->teacher->class_name]) }}",
                    method: "GET"
                },
                columns: [
                    { data: 'studentNisn', title: 'NISN' },
                    { data: 'studentName', title: 'Nama' },
                    { data: 'avgSemester1', title: 'Semester 1' },
                    { data: 'avgSemester2', title: 'Semester 2' },
                    { data: 'parentSign', title: 'Paraf Orang Tua', className: 'text-center' },
                    { data: 'teacherSign', title: 'Paraf Guru', className: 'text-center' }
                    // { data: 'action', title: 'Action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
