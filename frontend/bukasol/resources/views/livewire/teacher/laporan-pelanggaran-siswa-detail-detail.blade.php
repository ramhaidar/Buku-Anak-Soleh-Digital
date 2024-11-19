<div class="p-0 m-0">
    <div class="text-center p-0 m-0">
        <h2 class="text-center mb-4">Detail Pelanggaran Siswa Abdan Syakuro</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-4 rounded w-50">
            <form action="#" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nisn">NISN</label>
                    <input class="form-control rounded-5 border-dark border-2" id="nisn" name="nisn" type="text" value="123456" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <input class="form-control rounded-5 border-dark border-2" id="name" name="name" type="text" value="Abdan Syakuro" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class">Kelas</label>
                    <input class="form-control rounded-5 border-dark border-2" id="class" name="class" type="text" value="5 Dzad" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="date">Tanggal</label>
                    <input class="form-control rounded-5 border-dark border-2" id="date" name="date" type="date" value="2024-11-18" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="violation_details">Detail Pelanggaran</label>
                    <textarea class="form-control rounded-5 border-dark border-2" id="violation_details" name="violation_details" rows="3" readonly>Melanggar aturan seragam sekolah</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="consequence">Konsekuensi</label>
                    <textarea class="form-control rounded-5 border-dark border-2" id="consequence" name="consequence" rows="3" readonly>Tidak diperkenankan mengikuti pelajaran selama satu hari</textarea>
                </div>
            </form>
        </div>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.laporan-pelanggaran-siswa-detail-detail' })"></div>
</div>
