<div>
    @if ($showTeacherTable)
        <h3>Data Guru</h3>
        <table style="width: 100%; text-align: left;" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher['id'] }}</td>
                        <td>{{ $teacher['name'] }}</td>
                        <td>{{ $teacher['nip'] }}</td>
                        <td>{{ $teacher['className'] }}</td>
                        <td>{{ $teacher['username'] }}</td>
                        <td>{{ $teacher['password'] }}</td>
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
