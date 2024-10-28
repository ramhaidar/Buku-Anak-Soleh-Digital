<div>
    @if ($showTeacherTable)
        <div class="text-center">
            <h3 class="poppins-medium">Data Guru</h3>
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

                    {{-- <th>ID</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Password</th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher['nip'] }}</td>
                        {{-- <td>{{ $teacher['id'] }}</td> --}}
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
