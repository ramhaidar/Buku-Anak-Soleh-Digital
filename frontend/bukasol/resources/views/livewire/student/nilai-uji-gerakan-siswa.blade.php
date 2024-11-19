<div class="p-0 m-0">
    <style>
        #nilaiUjigerakanSiswaDetailTable thead th,
        #nilaiUjigerakanSiswaDetailTable tbody td {
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

    <div class="text-center p-0 m-0">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Detail Nilai Uji Gerakan Siswa Abdan Syakuro</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3">
                    <i class="fa-solid fa-file-export me-1"></i>
                    <span class="d-none d-md-inline">Export Nilai</span>
                </button>
            </div>
        </div>
    </div>
    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="nilaiUjigerakanSiswaDetailTable">
            <thead>
                <tr>
                    <th>Jenis Gerakan</th>
                    <th>Semester 1</th>
                    <th>Semester 2</th>
                    <th>Paraf Guru</th>
                    <th>Paraf Orang Tua</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Wudhu</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Tayammum</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Posisi Berdiri Shalat Qiyam</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Takbiratul Irham</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Ruku</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-sudah">Sudah</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>I’tidal</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sujud</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Duduk Antara Dua Sujud (Iftirasy)</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Duduk Tahiyat Akhir (Tawarruk)</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Salam</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td>{{ rand(0, 100) / 10 }}</td>
                    <td class="status-belum">Belum</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" onclick="showModal(this)">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.nilai-uji-gerakan-siswa-detail' })"></div>

    @include('livewire.student.partials.modal-kode-unik-paraf-orang-tua')

</div>
