<div>
    <!-- Navbar dengan Tombol -->
    <nav style="display: flex; gap: 1rem; margin-bottom: 1rem;">
        <button wire:click="loadstudents('A')">Tampilkan students class A</button>
        <button wire:click="loadstudents('B')">Tampilkan students class B</button>
    </nav>

    <!-- Tabel Data students -->
    @if ($class)
        <h3>Data students class {{ $class }}</h3>
        <table style="width: 100%;" border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>class</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $data)
                    <tr>
                        <td>{{ $data['nama'] }}</td>
                        <td>{{ $data['umur'] }}</td>
                        <td>{{ $data['class'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Silakan pilih class untuk menampilkan data students.</p>
    @endif
</div>
