@push('styles')
    <style>
        th,
        td {
            text-align: center;
        }

        .pagination {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 4px;
        }

        .pagination a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #000;
            border-radius: 4px;
            background-color: #e0e0e0;
        }

        .pagination .active a {
            background-color: #000;
            color: #fff;
        }
    </style>
@endpush

<div class="p-0 m-0">
    @if ($showTeacherTable)
        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0 ">Akun Guru</h2>
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

        <div class="text-center">
            <table class="table table-bordered table-striped table-sm p-0 m-0">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher['nip'] }}</td>
                            <td>{{ $teacher['name'] }}</td>
                            <td>{{ $teacher['className'] }}</td>
                            <td>{{ $teacher['username'] }}</td>
                            <td>{{ $teacher['password'] }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm col-auto">
                                        <a class="btn btn-link" href="#">Detail</a>
                                    </div>
                                    <div class="col-sm col-auto">
                                        <a class="btn btn-link" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">Tidak ada data guru ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <ul class="container-fluid p-0 m-0 pt-2 pb-3 d-flex align-items-center justify-content-center pagination">
            <li class="active"><a href="#1">1</a></li>
            <li><a href="#2">2</a></li>
            <li><a href="#3">3</a></li>
            <li><a href="#4">4</a></li>
        </ul>
    @endif
</div>
