<div class="p-0 m-0">
    <style>
        #studentTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        #studentTable tbody td {
            text-align: left;
            vertical-align: middle;
        }

        #studentTable tbody td:last-child {
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
                <h2 class="text-center mb-0">Akun Siswa</h2>
            </div>
            <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                <button class="btn btn-outline-dark rounded-3 me-2">
                    <i class="fa-solid fa-file-contract me-1"></i>
                    <span class="d-none d-md-inline">Export Akun</span>
                </button>
                <button class="btn btn-outline-dark rounded-3">
                    <i class="fa-solid fa-plus me-1"></i>
                    <span class="d-none d-md-inline">Tambah Siswa</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-center table-responsive">
        <table class="table table-bordered table-striped table-sm" id="studentTable" wire:ignore>
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables akan mengisi body tabel secara otomatis dengan data server-side -->
            </tbody>
        </table>
    </div>

    {{-- <div x-data x-init="$wire.dispatch('viewSwitched')"></div> --}}
    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student-table' })"></div>

</div>
