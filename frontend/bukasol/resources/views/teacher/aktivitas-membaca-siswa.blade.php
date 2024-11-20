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
    </style>

    <div class="text-center p-0 m-0 pe-1">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Aktivitas Membaca Siswa</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <!-- Dropdown Button -->
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle rounded-pill px-4 py-2" id="dropdownMenuButton" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                        <i class="fa-solid fa-chalkboard-teacher me-2"></i>
                        <span>5-Dzaid</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">6-Dzaid</a></li>
                        <li><a class="dropdown-item" href="#">7-Dzaid</a></li>
                    </ul>
                </div>
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
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
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
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
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
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
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
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>10</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.aktivitas-membaca-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>

                                <!-- Delete Button to Trigger Confirmation Modal -->
                                <button class="btn btn-sm btn-success py-2">
                                    <i class="fa fa-file-export"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.aktivitas-membaca-siswa' })"></div>
</div>
