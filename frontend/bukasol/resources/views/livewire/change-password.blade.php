<div class="p-0 m-0">
    <div class="d-flex justify-content-start align-items-start align-content-start">
        <div class="p-4 rounded w-50">
            <h3 class="text-start mb-4">Ganti Password Admin</h3>
            <form action="{{ route('change-password') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="current_password">Password Sekarang</label>
                    <input class="form-control rounded-5 border-dark border-2" id="current_password" name="current_password" type="password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="new_password">Password Baru</label>
                    <input class="form-control rounded-5 border-dark border-2" id="new_password" name="new_password" type="password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <input class="form-control rounded-5 border-dark border-2" id="new_password_confirmation" name="new_password_confirmation" type="password" required>
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <button class="btn btn-success mx-1 w-100 rounded-5" type="submit">Ganti</button>
                </div>
            </form>
        </div>
    </div>
</div>
