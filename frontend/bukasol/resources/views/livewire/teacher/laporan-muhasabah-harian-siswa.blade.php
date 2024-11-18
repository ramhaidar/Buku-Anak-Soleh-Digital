<div class="p-0 m-0">

    <style>
        #laporanMuhasabahHarianSiswaTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #laporanMuhasabahHarianSiswaTable tbody td {
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
                <h2 class="text-center mb-0">Laporan Muhasabah Harian Siswa Abc</h2>
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
                    <td>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-muhasabah-harian-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
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
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-muhasabah-harian-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
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
                    <td>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-muhasabah-harian-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
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
                    <td>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'teacher.laporan-muhasabah-harian-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.laporan-muhasabah-harian-siswa' })"></div>
</div>
