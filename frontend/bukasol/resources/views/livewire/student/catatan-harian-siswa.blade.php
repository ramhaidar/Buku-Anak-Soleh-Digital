<div class="p-0 m-0">
    <style>
        /* Penyesuaian tata letak tabel */
        #catatanHarianSiswaTable th,
        #catatanHarianSiswaTable td {
            text-align: center;
            /* Pusatkan teks secara horizontal */
            vertical-align: middle;
            /* Pusatkan teks secara vertikal */
            white-space: nowrap;
            /* Hindari pemotongan teks */
        }

        /* Penyesuaian status warna */
        .status-sudah {
            color: green;
            font-weight: bold;
        }

        .status-belum {
            color: red;
            font-weight: bold;
        }

        /* Penempatan switch agar di tengah */
        .form-check {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        /* Penyesuaian warna switch aktif */
        .form-check-input:checked {
            background-color: green !important;
        }

        .form-check-input:focus {
            border-color: green !important;
        }
    </style>

    <div class="text-center p-0 m-0 pe-1">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Detail Catatan Harian Siswa Abdan Syakuro</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3 me-2">
                    <i class="fa-solid fa-file-contract me-1"></i>
                    <span class="d-none d-md-inline">Export Catatan</span>
                </button>
                <button class="btn btn-outline-dark rounded-3" onclick="Livewire.dispatch('switchView', { view: 'student.add-catatan-harian-siswa' })">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Catatan</span>
                </button>
            </div>
        </div>
    </div>
    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="catatanHarianSiswaTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Agenda</th>
                    <th>Catatan</th>
                    <th>Balasan Guru</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/09/2024</td>
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-sudah">Ada</span></td>
                    <td><span class="status-sudah">Sudah</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-sudah">Ada</span></td>
                    <td><span class="status-belum">Belum</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-sudah">Sudah</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-sudah">Ada</span></td>
                    <td><span class="status-belum">Belum</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-sudah">Sudah</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-sudah">Sudah</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-belum">Belum</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-sudah">Ada</span></td>
                    <td><span class="status-sudah">Sudah</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-belum">Belum</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
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
                    <td>Membaca Buku</td>
                    <td>Hari ini saya.....</td>
                    <td><span class="status-belum">Tidak Ada</span></td>
                    <td><span class="status-belum">Belum</span></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.catatan-harian-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteStudentViolationConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.catatan-harian-siswa' })"></div>
</div>
