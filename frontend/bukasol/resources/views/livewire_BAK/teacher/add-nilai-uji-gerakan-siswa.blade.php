<div class="p-0 m-0">
    <div class="text-center p-0 m-0">
        <h2 class="text-center mb-4">Tambah Nilai Uji Gerakan Siswa</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-4 rounded w-50">
            <form action="#" method="POST">
                @csrf

                <!-- Name Input -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <input class="form-control rounded-5 border-dark border-2" id="name" name="name" type="text" value="Abdan Syakuro" placeholder="Nama Siswa..." readonly disabled>
                </div>

                <!-- Jenis Gerakan Input -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="jenis_gerakan">Jenis Gerakan</label>
                    <input class="form-control rounded-5 border-dark border-2" id="jenis_gerakan" name="jenis_gerakan" type="text" placeholder="Jenis Gerakan..." required>
                </div>

                <!-- Nilai Semester 1 Input -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nilai_semester_1">Nilai Semester 1</label>
                    <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_1" name="nilai_semester_1" type="text" placeholder="Nilai Semester 1..." required>
                </div>

                <!-- Nilai Semester 2 Input -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nilai_semester_2">Nilai Semester 2</label>
                    <input class="form-control rounded-5 border-dark border-2" id="nilai_semester_2" name="nilai_semester_2" type="text" placeholder="Nilai Semester 2..." required>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-center pt-3">
                    <a class="btn btn-secondary mx-1 w-50 rounded-5" href="{{ url()->previous() }}">Batal</a>
                    <button class="btn btn-success mx-1 w-50 rounded-5" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.add-nilai-uji-gerakan-siswa' })"></div>
</div>
