<div class="p-0 m-0">
    <div class="text-center p-0 m-0">
        <h2 class="text-center mb-4">Jawab Pertanyaan Orang Tua Siswa Abdan Syakuro</h2>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-4 rounded w-50">
            <form action="#" method="POST">
                @csrf

                <!-- Pertanyaan Orang Tua -->
                <div class="mb-4">
                    <label class="form-label fw-semibold d-block" for="pertanyaan_orang_tua">Pertanyaan Orang Tua</label>
                    <div class="bg-dark text-white p-3 rounded-3">
                        Apakah ananda ada kendala di sekolah?
                    </div>
                </div>

                <!-- Jawaban Guru -->
                <div class="mb-4">
                    <label class="form-label fw-semibold" for="jawaban_guru">Jawaban Guru</label>
                    <textarea class="form-control rounded-3 border-dark border-2" id="jawaban_guru" name="jawaban_guru" rows="3" placeholder="Jawaban Guru..."></textarea>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between pt-3">
                    <button class="btn btn-secondary w-100 mx-2 rounded-5" type="reset">Reset</button>
                    <button class="btn btn-success w-100 mx-2 rounded-5" type="submit">Jawab</button>
                </div>
            </form>
        </div>
    </div>

    <div x-data x-init="$wire.dispatch('viewSwitched', { view: 'teacher.answer-parent-question' })"></div>
</div>
