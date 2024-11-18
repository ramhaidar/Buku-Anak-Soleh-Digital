<div class="p-0 m-0">
    <style>
        #nilaiUjiBacaanSiswaDetailTable thead th,
        #nilaiUjiBacaanSiswaDetailTable tbody td {
            text-align: center;
            vertical-align: middle
        }

        th,
        td {
            white-space: nowrap
        }

        th:last-child,
        td:last-child {
            width: 1%
        }

        .status-sudah {
            color: green;
            font-weight: bold
        }

        .status-belum {
            color: red;
            font-weight: bold
        }

        .switch {
            display: inline-block;
            width: 34px;
            height: 20px;
            position: relative
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0
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
            border-radius: 20px
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
            border-radius: 50%
        }

        input:checked+.slider {
            background-color: green
        }

        input:checked+.slider:before {
            transform: translateX(14px)
        }
    </style>
    <div class="text-center p-0 m-0">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Detail Nilai Uji Bacaan Siswa Abdan Syakuro</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3" onclick="Livewire.dispatch('switchView', { view: 'teacher.add-nilai-uji-bacaan-siswa' })">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Nilai Uji Bacaan</span>
                </button>
            </div>
        </div>
    </div>
    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="nilaiUjiBacaanSiswaDetailTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis Bacaan</th>
                    <th>Semester 1</th>
                    <th>Semester 2</th>
                    <th>Paraf Orang tua</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/09/2024</td>
                    <td>Adzan</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Iqamah</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Takbiratul Ihram</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Iftitah</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Ruku</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td><label class="switch"><input type="checkbox" checked><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan I'tidal</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Sujud</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Duduk Antara Dua Sujud</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Tasyahud</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Doa Setelah Tasyahud Akhir</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bacaan Salam</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Doa Adzan</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Zikir Sesudah Shalat</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td><label class="switch"><input type="checkbox"><span class="slider"></span></label></td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-warning py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.edit-nilai-uji-bacaan-siswa' })">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-danger py-2" data-bs-toggle="modal" data-bs-target="#deleteNilaiUjiBacaanSiswaConfirmationModal">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })"></div>

    @include('livewire.teacher.partials.nilai-uji-bacaan-siswa-detail-delete')
</div>
