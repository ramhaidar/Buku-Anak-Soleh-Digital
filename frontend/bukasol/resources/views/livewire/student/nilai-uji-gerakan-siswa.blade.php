<div class="p-0 m-0">

    <style>
        #nilaiUjiGerakanSiswaTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #nilaiUjiGerakanSiswaTable tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
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
            border-radius: 34px;
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
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(14px);
        }
    </style>

    <div class="text-center p-0 m-0 pe-1">
        <div class="row align-items-center mb-4">
            <div class="col container position-relative">
                <h2 class="text-center mb-0">Lembar Nilai Uji Gerakan Siswa</h2>
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
        <table class="table table-bordered table-striped table-sm" id="nilaiUjiGerakanSiswaTable">
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
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-danger">Belum</td>
                    <td><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                </tr>
                <tr>
                    <td>Wudhu</td>
                    <td>0.0</td>
                    <td>0.0</td>
                    <td class="text-success">Sudah</td>
                    <td><label class="switch"><input type="checkbox" checked disabled><span class="slider"></span></label></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.nilai-uji-gerakan-siswa' })"></div>
</div>
