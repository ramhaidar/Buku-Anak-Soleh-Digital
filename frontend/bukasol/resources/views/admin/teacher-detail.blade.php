@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Detail Akun Guru</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <!-- Start of the form -->

                <!-- NIP -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nip">NIP</label>
                    <input class="form-control rounded-3 border-dark border-2" id="nip" name="nip" type="text" value="{{ $teacher->nip }}" readonly disabled>
                </div>
                
                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <input class="form-control rounded-3 border-dark border-2" id="name" name="name" type="text" value="{{ $teacher->user->name }}" readonly disabled>
                </div>

                <!-- Kelas -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class_name">Kelas</label>
                    <input class="form-control rounded-3 border-dark border-2" id="class_name" name="class_name" type="text" value="{{ $teacher->class_name }}" readonly disabled>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="username">Username</label>
                    <input class="form-control rounded-3 border-dark border-2" id="username" name="username" type="text" value="{{ $teacher->user->username }}" readonly disabled>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <input class="form-control rounded-3 border-dark border-2" id="password" name="password" type="text" value="{{ $password }}" readonly disabled>
                </div>

                <!-- End of the form -->
            </div>
        </div>
    </div>
@endsection

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