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
                    <h2 class="text-center mb-0">Detail Bacaan Juz 29 Siswa Abdan Syakuro</h2>
                </div>
            </div>
        </div>

        <div class="text-center table-responsive">
            <table class="table table-bordered table-striped table-sm" id="laporanBacaanJuz29SiswaDetailTable">
                <thead class="text-center">
                    <tr>
                        <th>Tanggal</th>
                        <th>Surah</th>
                        <th>Ayat</th>
                        <th>Paraf Orang Tua</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-success">Sudah</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-danger">Belum</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-success">Sudah</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-danger">Belum</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-danger">Belum</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-success">Sudah</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-danger">Belum</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-success">Sudah</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-danger">Belum</td>
                    </tr>
                    <tr>
                        <td>11/09/2024</td>
                        <td>Al-Baqarah</td>
                        <td>1-10</td>
                        <td class="text-success">Sudah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
