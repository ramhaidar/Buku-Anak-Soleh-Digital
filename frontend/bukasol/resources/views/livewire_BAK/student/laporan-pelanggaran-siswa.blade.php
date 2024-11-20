<div class="p-0 m-0">

    <style>
        #laporanPelanggaranSiswaTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #laporanPelanggaranSiswaTable tbody td {
            text-align: left;
            vertical-align: middle;
        }

        #laporanPelanggaranSiswaTable tbody td:last-child {
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
    </style>

    <div class="text-center p-0 m-0 pe-1">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Lembar Pelanggaran Siswa</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3 me-2">
                    <i class="fa-solid fa-file-contract me-1"></i>
                    <span class="d-none d-md-inline">Export Lembar Pelanggaran</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="laporanPelanggaranSiswaTable">
            <thead class="text-center">
                <tr>
                    <th>Tanggal</th>
                    <th>Pelanggaran</th>
                    <th>Konsekuensi</th>
                    <th>Paraf Guru</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Rows as per Image -->
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-danger">Belum</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Tidak Membawa Buku</td>
                    <td>Membuat Permintaan Maaf</td>
                    <td class="text-success">Sudah</td>
                    <td>
                        <div class="container-fluid w-100">
                            <div class="d-flex justify-content-center w-100">
                                <!-- Detail Button to Trigger Detail Modal -->
                                <button class="btn btn-sm btn-primary py-2 me-2" onclick="Livewire.dispatch('switchView', { view: 'student.laporan-pelanggaran-siswa-detail' })">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.laporan-pelanggaran-siswa' })"></div>
</div>
