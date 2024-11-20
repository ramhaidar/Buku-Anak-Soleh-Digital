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
            <h2 class="text-center mb-4">Detail Catatan Harian Siswa Abdan Syakuro</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-50">
                <form action="#" method="POST">
                    @csrf

                    <!-- Hari/Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="hari_tanggal">Hari/Tanggal</label>
                        <input class="form-control rounded-5 border-dark border-2" id="hari_tanggal" name="hari_tanggal" type="text" value="Rabu, 11/09/2024" readonly disabled>
                    </div>

                    <!-- Agenda Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="agenda">Agenda</label>
                        <input class="form-control rounded-5 border-dark border-2" id="agenda" name="agenda" type="text" value="Membaca Buku" readonly disabled>
                    </div>

                    <!-- Catatan Harian Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="catatan_harian">Catatan Harian</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="catatan_harian" name="catatan_harian" rows="3" readonly disabled>Hari ini saya membaca buku bacaan yang seru</textarea>
                    </div>

                    <!-- Pertanyaan Orang Tua Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="pertanyaan_orang_tua">Pertanyaan Orang Tua</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="pertanyaan_orang_tua" name="pertanyaan_orang_tua" rows="3" readonly disabled>Tidak Ada Pertanyaan</textarea>
                    </div>

                    <!-- Jawaban Guru Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="jawaban_guru">Jawaban Guru</label>
                        <textarea class="form-control rounded-5 border-dark border-2" id="jawaban_guru" name="jawaban_guru" rows="3" readonly disabled>Tidak Ada Jawaban dari Pertanyaan Orang Tua</textarea>
                    </div>

                    <!-- Paraf Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="paraf">Paraf</label>
                        <input class="form-control rounded-5 border-dark border-2" id="paraf" name="paraf" type="text" value="Guru - Sudah" readonly disabled>
                    </div>

                    <!-- Button Placeholder -->
                    <div class="d-flex justify-content-center pt-3">
                        <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ url()->previous() }}">Batal</a>
                        <a class="btn btn-success mx-1 w-50 rounded-5" href="{{ route('teacher.catatan-harian-siswa-detail-detail-answer.index', ['id' => 1]) }}">Jawab Pertanyaan Orang Tua</a>
                    </div>
                </form>
            </div>
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
