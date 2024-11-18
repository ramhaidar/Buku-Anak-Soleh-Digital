<div class="p-0 m-0">

    <style>
        #laporanPelanggaranSiswaDetailTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #laporanPelanggaranSiswaDetailTable tbody td {
            text-align: center;
            vertical-align: middle;
        }

        th,
        td {
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            width: 1%;
        }

        .status-sudah {
            color: green;
            font-weight: bold;
        }

        .status-belum {
            color: red;
            font-weight: bold;
        }

        .switch {
            display: inline-block;
            width: 34px;
            height: 20px;
            position: relative;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: green;
        }

        input:checked+.slider:before {
            transform: translateX(14px);
        }
    </style>

    <div class="text-center p-0 m-0">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Laporan Pelanggaran Siswa Abdan Syakuro</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3" onclick="Livewire.dispatch('switchView', { view: 'teacher.add-laporan-pelanggaran-siswa' })">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Pelanggaran</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="laporanPelanggaranSiswaDetailTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggaran</th>
                    <th>Konsekuensi</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-pelanggaran-siswa-detail-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteStudentViolationConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-pelanggaran-siswa-detail-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteStudentViolationConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Tambahkan baris sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.laporan-pelanggaran-siswa-detail' })"></div>

    @include('livewire.teacher.partials.laporan-pelanggaran-siswa-detail-delete')
</div>
