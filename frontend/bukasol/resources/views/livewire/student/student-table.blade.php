<div>
    @if ($showStudentTable)
        <div class="text-center">
            <h3 class="poppins-medium">Data Siswa</h3>
        </div>
        <table style="width: 100%; text-align: left;" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student['nisn'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td>{{ $student['className'] }}</td>
                        <td>{{ $student['username'] }}</td>
                        <td>{{ $student['password'] }}</td>
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
                        <td colspan="6">Tidak ada data siswa ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div>
