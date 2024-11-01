<div>
    @if ($showTeacherTable)
        <div class="text-center">
            {{-- <h3 class="poppins-medium">Data Guru</h3> --}}
            <div class="row align-items-center mb-4">
                <div class="container position-relative">
                    <!-- Centered Title -->
                    <h2 class="text-center mb-0 position-absolute top-0 start-50 translate-middle-x">Data Guru</h2>
                </div>
                <div class="col d-flex justify-content-end align-items-end mt-3 mt-md-0">
                    <button class="btn btn-outline-dark rounded-3 me-2"><i class="fa-solid fa-file-contract me-1"></i> Export Akun</button>
                    <button class="btn btn-outline-dark rounded-3"><i class="fa-solid fa-plus me-1"></i> Tambah Siswa</button>
                </div>
            </div>
        </div>
        <table style="width: 100%; text-align: left;" border="1" cellpadding="10">
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
                                <div class="col-3">
                                    <a href="#">Detail</a>
                                </div>
                                <div class="col-3">
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data guru ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div>
