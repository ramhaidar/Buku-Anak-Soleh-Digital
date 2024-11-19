<div class="p-0 m-0">
    <style>
        #aktivitasMembacaSiswaDetailTable thead th,
        #aktivitasMembacaSiswaDetailTable tbody td {
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

    <div class="text-center p-0 m-0">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Detail Aktivitas Membaca Siswa Abdan Syakuro</h2>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="aktivitasMembacaSiswaDetailTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Judul Buku</th>
                    <th>Halaman</th>
                    <th>Paraf Orang Tua</th>
                    <th>Paraf Guru</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11/09/2024</td>
                    <td>Bumi Manusia</td>
                    <td>10-25</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.aktivitas-membaca-siswa-detail' })"></div>
</div>
