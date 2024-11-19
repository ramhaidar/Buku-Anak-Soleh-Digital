<div class="p-0 m-0">

    <style>
        #aktivitasMembacaSiswaTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #aktivitasMembacaSiswaTable tbody td {
            text-align: left;
            vertical-align: middle;
        }

        #aktivitasMembacaSiswaTable tbody td:last-child {
            text-align: center;
        }

        td,
        th {
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            width: 1%;
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }

        /* Ensure the switch is centered both horizontally and vertically */
        .form-check {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        /* Customize the slider's active color to green */
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
                <h2 class="text-center mb-0">Aktivitas Membaca Siswa</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3 me-2">
                    <i class="fa-solid fa-file-contract me-1"></i>
                    <span class="d-none d-md-inline">Export Catatan</span>
                </button>
                <button class="btn btn-outline-dark rounded-3" onclick="Livewire.dispatch('switchView', { view: 'student.add-aktivitas-membaca-siswa' })">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Catatan</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="aktivitasMembacaSiswaTable">
            <thead class="text-center">
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Total Aktivitas</th>
                    <th>Paraf Orang Tua</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2 me-2" data-bs-toggle="modal" data-bs-target="#deleteAktivitasMembacaSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.aktivitas-membaca-siswa' })"></div>

    @include('livewire.student.partials.aktivitas-membaca-siswa-delete')
    @include('livewire.student.partials.modal-kode-unik-paraf-orang-tua')
</div>
