<div class="p-0 m-0">

    <div class="container py-4">
        <div class="text-center mb-4">
            <h2>Detail Muhasabah Siswa Abdan Syakuro</h2>
        </div>

        <div class="mb-3">
            <div class="d-flex">
                <strong class="me-3">Hari/Tanggal:</strong>
                <span>Rabu, 11/09/2024</span>
            </div>
        </div>

        <div class="mb-3">
            <div class="d-flex">
                <strong class="me-3">Mengaji:</strong>
                <span>Surat Al-Baqarah</span>
            </div>
        </div>

        <div class="mb-4">
            <div class="d-flex">
                <strong class="me-3">Ayat:</strong>
                <span>1-10</span>
            </div>
        </div>

        <div class="mb-4">
            <h3>Shalat Sunnah</h3>
            <span class="badge bg-danger">Tidak Shalat</span>
        </div>

        <div class="mb-4">
            <h3>Shalat Fardhu</h3>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Subuh
                    <span class="badge bg-success">Shalat</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dzuhur
                    <span class="badge bg-danger">Tidak Shalat</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ashar
                    <span class="badge bg-success">Shalat</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Maghrib
                    <span class="badge bg-success">Shalat</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Isya
                    <span class="badge bg-danger">Tidak Shalat</span>
                </li>
            </ul>
        </div>

        <div class="mb-4">
            <h3>Paraf</h3>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Guru
                    <span class="badge bg-success">Sudah</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Orang Tua
                    <span class="badge bg-danger">Belum</span>
                </li>
            </ul>
        </div>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.laporan-muhasabah-harian-siswa-detail' })"></div>
</div>
