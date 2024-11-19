<div class="p-0 m-0">
    <style>
        /* Centering table content */
        #laporanMuhasabahHarianSiswaTable th,
        #laporanMuhasabahHarianSiswaTable td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        /* Centering switch elements */
        .form-check {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        /* Styling for active switch */
        .form-check-input:checked {
            background-color: green !important;
        }

        .form-check-input:focus {
            border-color: green !important;
        }

        /* Status color classes */
        .status-sudah {
            color: green !important;
            /* font-weight: bold; */
        }

        .status-belum {
            color: red !important;
            /* font-weight: bold; */
        }

        td,
        th {
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            width: 1%;
        }
    </style>

    <div class="text-center p-0 m-0 pe-1">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Laporan Muhasabah Harian</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3 me-2">
                    <i class="fa-solid fa-file-contract me-1"></i>
                    <span class="d-none d-md-inline">Export Muhasabah Harian</span>
                </button>
                <button class="btn btn-outline-dark rounded-3" onclick="Livewire.dispatch('switchView', { view: 'student.add-laporan-muhasabah-harian' })">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Laporan</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="laporanMuhasabahHarianSiswaTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Mengaji</th>
                    <th>Sholat Sunnah</th>
                    <th>Sholat Fardhu</th>
                    <th>Paraf Guru</th>
                    <th>Paraf Orang Tua</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-belum">Tidak</td>
                    <td class="status-belum">Tidak</td>
                    <td>4/5</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-sudah">Sudah</td>
                    <td class="status-sudah">Sudah</td>
                    <td>5/5</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-sudah">Sudah</td>
                    <td class="status-belum">Tidak</td>
                    <td>4/5</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-belum">Tidak</td>
                    <td class="status-sudah">Sudah</td>
                    <td>5/5</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-sudah">Sudah</td>
                    <td class="status-sudah">Sudah</td>
                    <td>4/5</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-sudah">Sudah</td>
                    <td class="status-belum">Tidak</td>
                    <td>5/5</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-belum">Tidak</td>
                    <td class="status-belum">Tidak</td>
                    <td>4/5</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td class="status-sudah">Sudah</td>
                    <td class="status-sudah">Sudah</td>
                    <td>5/5</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-muhasabah-harian-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteLaporanMuhasabahHarianConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.laporan-muhasabah-harian' })"></div>

    @include('livewire.student.partials.modal-kode-unik-paraf-orang-tua')
    @include('livewire.student.partials.laporan-muhasabah-harian-delete')

</div>
