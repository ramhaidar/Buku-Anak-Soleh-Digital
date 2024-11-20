<div class="p-0 m-0">

    <style>
        #nilaiUjiBacaanSiswaTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #nilaiUjiBacaanSiswaTable tbody td {
            text-align: left;
            vertical-align: middle;
        }

        #nilaiUjiBacaanSiswaTable tbody td:last-child {
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
                <h2 class="text-center mb-0">Nilai Uji Bacaan Siswa</h2>
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
        <table class="table table-bordered table-striped table-sm" id="nilaiUjiBacaanSiswaTable">
            <thead class="text-center">
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Semester 1</th>
                    <th>Semester 2</th>
                    <th>Paraf Orang Tua</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456</td>
                    <td>Abc</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-success">Sudah</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123457</td>
                    <td>Abc</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123458</td>
                    <td>Def</td>
                    <td>10.0</td>
                    <td>20.0</td>
                    <td class="text-success">Sudah</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123459</td>
                    <td>Ghi</td>
                    <td>15.5</td>
                    <td>18.0</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123460</td>
                    <td>Jkl</td>
                    <td>5.0</td>
                    <td>7.0</td>
                    <td class="text-success">Sudah</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123461</td>
                    <td>Mno</td>
                    <td>12.0</td>
                    <td>14.0</td>
                    <td class="text-danger">Belum</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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
                    <td>123462</td>
                    <td>Pqr</td>
                    <td>8.5</td>
                    <td>9.0</td>
                    <td class="text-success">Sudah</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.nilai-uji-bacaan-siswa-detail' })">
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

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.nilai-uji-bacaan-siswa' })"></div>
</div>
