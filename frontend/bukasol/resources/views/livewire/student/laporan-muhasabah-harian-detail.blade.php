<div class="p-0 m-0">
    <div class="text-center p-0 m-0">
        <h2 class="text-center mb-4">Detail Laporan Muhasabah Harian Siswa Abdan Syakuro</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-4 rounded w-50">
            <form>
                <!-- Hari/Tanggal -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="hari_tanggal">Hari/Tanggal</label>
                    <input class="form-control rounded-5 border-dark border-2" id="hari_tanggal" type="text" value="Rabu, 11/09/2024" readonly>
                </div>

                <!-- Mengaji -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="mengaji">Mengaji</label>
                    <input class="form-control rounded-5 border-dark border-2" id="mengaji" type="text" value="Surat Al-Baqarah" readonly>
                    <input class="form-control mt-2 rounded-5 border-dark border-2" id="ayat" type="text" value="Ayat 1-10" readonly>
                </div>

                <!-- Sholat Sunnah -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="sholat_sunnah">Sholat Sunnah</label>
                    <div class="p-2 rounded-5 text-white text-center" style="background-color: red;">Tidak Shalat</div>
                </div>

                <!-- Sholat Fardhu -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="sholat_fardhu">Sholat Fardhu</label>
                    <div class="p-2 rounded-5 text-white text-center mb-2" style="background-color: green;">Subuh - Shalat</div>
                    <div class="p-2 rounded-5 text-white text-center mb-2" style="background-color: red;">Dzuhur - Tidak Shalat</div>
                    <div class="p-2 rounded-5 text-white text-center mb-2" style="background-color: green;">Ashar - Shalat</div>
                    <div class="p-2 rounded-5 text-white text-center mb-2" style="background-color: green;">Maghrib - Shalat</div>
                    <div class="p-2 rounded-5 text-white text-center" style="background-color: red;">Isya - Tidak Shalat</div>
                </div>

                <!-- Paraf -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="paraf">Paraf</label>
                    <div class="p-2 rounded-5 text-white text-center mb-2" style="background-color: green;">Guru - Sudah</div>
                    <div class="p-2 rounded-5 text-white text-center" style="background-color: red;">Orang Tua - Belum</div>
                </div>
            </form>
        </div>
    </div>
    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'student.laporan-muhasabah-harian-detail' })"></div>
</div>
