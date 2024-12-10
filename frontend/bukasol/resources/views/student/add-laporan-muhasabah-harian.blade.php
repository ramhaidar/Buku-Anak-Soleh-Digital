@extends('student.student-dashboard')

@push('styles')
    <link href="{{ asset('css/dashboardWithTable.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .form-check-input:checked {
            background-color: green !important;
        }

        .form-check-input:focus {
            border-color: green !important;
        }
    </style>

    <style>
        .select2-container--default .select2-selection--single {
            border: 2px solid black;
            border-radius: 7px;
            height: 125%;
            align-content: center;
            padding-left: 7px
        }
    </style>
@endpush

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Tambah Laporan Muhasabah Harian Siswa</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('muhasabah-report.store') }}" method="POST">
                    @csrf

                    <input class="form-control rounded-3 border-dark border-2" id="studentId" name="studentId" type="hidden" value="{{ $studentId }}" readonly>

                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <input class="form-control rounded-3 border-dark border-2" id="nama" name="nama" type="text" value="{{ $studentName }}" readonly disabled>
                    </div>

                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="tanggal">Tanggal</label>
                        <input class="form-control rounded-3 border-dark border-2" id="tanggal" name="tanggal" type="date" value="{{ $today }}" required>
                    </div>

                    <!-- Mengaji Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="mengaji">Mengaji</label>
                        <div class="input-group mb-3" id="select2container">
                            <select class="form-select rounded-3 border-dark border-2" id="surah" name="surah">
                                <option value="" disabled selected>Pilih Surat</option>
                                <!-- Options dynamically generated based on the Juz -->
                                <option value="Al-Fatihah">Al-Fatihah</option>
                                <option value="Al-Baqarah">Al-Baqarah</option>
                                <option value="Ali 'Imran">Ali 'Imran</option>
                                <option value="An-Nisa'">An-Nisa'</option>
                                <option value="Al-Ma'idah">Al-Ma'idah</option>
                                <option value="Al-An'am">Al-An'am</option>
                                <option value="Al-A'raf">Al-A'raf</option>
                                <option value="Al-Anfal">Al-Anfal</option>
                                <option value="At-Taubah">At-Taubah</option>
                                <option value="Yunus">Yunus</option>
                                <option value="Hud">Hud</option>
                                <option value="Yusuf">Yusuf</option>
                                <option value="Ar-Ra'd">Ar-Ra'd</option>
                                <option value="Ibrahim">Ibrahim</option>
                                <option value="Al-Hijr">Al-Hijr</option>
                                <option value="An-Nahl">An-Nahl</option>
                                <option value="Al-Isra'">Al-Isra'</option>
                                <option value="Al-Kahf">Al-Kahf</option>
                                <option value="Maryam">Maryam</option>
                                <option value="Ta-Ha">Ta-Ha</option>
                                <option value="Al-Anbiya">Al-Anbiya</option>
                                <option value="Al-Hajj">Al-Hajj</option>
                                <option value="Al-Mu'minun">Al-Mu'minun</option>
                                <option value="An-Nur">An-Nur</option>
                                <option value="Al-Furqan">Al-Furqan</option>
                                <option value="Asy-Syu'ara'">Asy-Syu'ara'</option>
                                <option value="An-Naml">An-Naml</option>
                                <option value="Al-Qasas">Al-Qasas</option>
                                <option value="Al-'Ankabut">Al-'Ankabut</option>
                                <option value="Ar-Rum">Ar-Rum</option>
                                <option value="Luqman">Luqman</option>
                                <option value="As-Sajdah">As-Sajdah</option>
                                <option value="Al-Ahzab">Al-Ahzab</option>
                                <option value="Saba'">Saba'</option>
                                <option value="Fatir">Fatir</option>
                                <option value="Ya-Sin">Ya-Sin</option>
                                <option value="As-Saffat">As-Saffat</option>
                                <option value="Sad">Sad</option>
                                <option value="Az-Zumar">Az-Zumar</option>
                                <option value="Ghafir">Ghafir</option>
                                <option value="Fussilat">Fussilat</option>
                                <option value="Asy-Syura">Asy-Syura</option>
                                <option value="Az-Zukhruf">Az-Zukhruf</option>
                                <option value="Ad-Dukhan">Ad-Dukhan</option>
                                <option value="Al-Jatsiyah">Al-Jatsiyah</option>
                                <option value="Al-Ahqaf">Al-Ahqaf</option>
                                <option value="Muhammad">Muhammad</option>
                                <option value="Al-Fath">Al-Fath</option>
                                <option value="Al-Hujurat">Al-Hujurat</option>
                                <option value="Qaf">Qaf</option>
                                <option value="Az-Zariyat">Az-Zariyat</option>
                                <option value="At-Tur">At-Tur</option>
                                <option value="An-Najm">An-Najm</option>
                                <option value="Al-Qamar">Al-Qamar</option>
                                <option value="Ar-Rahman">Ar-Rahman</option>
                                <option value="Al-Waqi'ah">Al-Waqi'ah</option>
                                <option value="Al-Hadid">Al-Hadid</option>
                                <option value="Al-Mujadilah">Al-Mujadilah</option>
                                <option value="Al-Hasyr">Al-Hasyr</option>
                                <option value="Al-Mumtahanah">Al-Mumtahanah</option>
                                <option value="As-Saff">As-Saff</option>
                                <option value="Al-Jumu'ah">Al-Jumu'ah</option>
                                <option value="Al-Munafiqun">Al-Munafiqun</option>
                                <option value="At-Taghabun">At-Taghabun</option>
                                <option value="At-Talaq">At-Talaq</option>
                                <option value="At-Tahrim">At-Tahrim</option>
                                <option value="Al-Mulk">Al-Mulk</option>
                                <option value="Al-Qalam">Al-Qalam</option>
                                <option value="Al-Haqqah">Al-Haqqah</option>
                                <option value="Al-Ma'arij">Al-Ma'arij</option>
                                <option value="Nuh">Nuh</option>
                                <option value="Al-Jinn">Al-Jinn</option>
                                <option value="Al-Muzzammil">Al-Muzzammil</option>
                                <option value="Al-Muddatstsir">Al-Muddatstsir</option>
                                <option value="Al-Qiyamah">Al-Qiyamah</option>
                                <option value="Al-Insan">Al-Insan</option>
                                <option value="Al-Mursalat">Al-Mursalat</option>
                                <option value="An-Naba'">An-Naba'</option>
                                <option value="An-Nazi'at">An-Nazi'at</option>
                                <option value="Abasa">Abasa</option>
                                <option value="At-Takwir">At-Takwir</option>
                                <option value="Al-Infitar">Al-Infitar</option>
                                <option value="Al-Muthaffifin">Al-Muthaffifin</option>
                                <option value="Al-Insyiqaq">Al-Insyiqaq</option>
                                <option value="Al-Buruj">Al-Buruj</option>
                                <option value="At-Tariq">At-Tariq</option>
                                <option value="Al-A'la">Al-A'la</option>
                                <option value="Al-Ghasyiyah">Al-Ghasyiyah</option>
                                <option value="Al-Fajr">Al-Fajr</option>
                                <option value="Al-Balad">Al-Balad</option>
                                <option value="Asy-Syams">Asy-Syams</option>
                                <option value="Al-Lail">Al-Lail</option>
                                <option value="Ad-Duha">Ad-Duha</option>
                                <option value="Al-Insyirah">Al-Insyirah</option>
                                <option value="At-Tin">At-Tin</option>
                                <option value="Al-'Alaq">Al-'Alaq</option>
                                <option value="Al-Qadr">Al-Qadr</option>
                                <option value="Al-Bayyinah">Al-Bayyinah</option>
                                <option value="Az-Zalzalah">Az-Zalzalah</option>
                                <option value="Al-'Adiyat">Al-'Adiyat</option>
                                <option value="Al-Qari'ah">Al-Qari'ah</option>
                                <option value="At-Takatsur">At-Takatsur</option>
                                <option value="Al-'Asr">Al-'Asr</option>
                                <option value="Al-Humazah">Al-Humazah</option>
                                <option value="Al-Fil">Al-Fil</option>
                                <option value="Quraisy">Quraisy</option>
                                <option value="Al-Ma'un">Al-Ma'un</option>
                                <option value="Al-Kautsar">Al-Kautsar</option>
                                <option value="Al-Kafirun">Al-Kafirun</option>
                                <option value="An-Nasr">An-Nasr</option>
                                <option value="Al-Lahab">Al-Lahab</option>
                                <option value="Al-Ikhlas">Al-Ikhlas</option>
                                <option value="Al-Falaq">Al-Falaq</option>
                                <option value="An-Nas">An-Nas</option>
                            </select>
                        </div>

                        <input class="form-control rounded-3 border-dark border-2 mb-2" id="ayat_awal" name="ayat_awal" type="text" placeholder="Ayat Awal Mengaji...">
                        <input class="form-control rounded-3 border-dark border-2" id="ayat_akhir" name="ayat_akhir" type="text" placeholder="Ayat Akhir Mengaji...">
                    </div>

                    <!-- Shalat Sunnah Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="shalat_sunnah">Shalat Sunnah</label>
                        <select class="form-select rounded-3 border-dark border-2" id="shalat_sunnah" name="shalat_sunnah" required>
                            <option value="" disabled selected>Apakah Shalat Sunnah?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Shalat Fardhu Inputs -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Shalat Fardhu</label>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="subuh" name="subuh" required>
                            <option value="" disabled selected>Apakah Shalat Subuh?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="dzuhur" name="dzuhur" required>
                            <option value="" disabled selected>Apakah Shalat Dzuhur?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="ashar" name="ashar" required>
                            <option value="" disabled selected>Apakah Shalat Ashar?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2 mb-2" id="maghrib" name="maghrib" required>
                            <option value="" disabled selected>Apakah Shalat Maghrib?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                        <select class="form-select rounded-3 border-dark border-2" id="isya" name="isya" required>
                            <option value="" disabled selected>Apakah Shalat Isya?</option>
                            <option value="Sudah">Shalat</option>
                            <option value="Tidak">Tidak Shalat</option>
                        </select>
                    </div>

                    <!-- Reset and Submit Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('student.laporan-muhasabah-siswa-table.index') }}">Batal</a>
                        <button class="btn btn-success rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#surah').select2({
                placeholder: 'Pilih Surah',
                allowClear: true,
                width: '100%',
                // dropdownCssClass: "",
                selectionCssClass: "",
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        window.addEventListener("pageshow", function(event) {
            if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                // Reload the page when navigating forward or back in history
                location.reload();
            }
        });
    </script>
@endpush