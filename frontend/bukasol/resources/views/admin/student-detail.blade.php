@extends('admin.admin-dashboard')

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0 pe-1">
            <div class="row align-items-center mb-4">
                <div class="col container position-relative">
                    <h2 class="text-center mb-0">Detail Akun Siswa</h2>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="nisn">NISN</label>
                    <input class="form-control rounded-3 border-dark border-2" id="nisn" name="nisn" type="text" value="{{ $student->nisn }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama</label>
                    <input class="form-control rounded-3 border-dark border-2" id="name" name="name" type="text" value="{{ $student->user->name }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="class_name">Kelas</label>
                    <input class="form-control rounded-3 border-dark border-2" id="class_name" name="class_name" type="text" value="{{ $student->class_name }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="username">Username</label>
                    <input class="form-control rounded-3 border-dark border-2" id="username" name="username" type="text" value="{{ $student->user->username }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <input class="form-control rounded-3 border-dark border-2" id="password" name="password" type="text" value="{{ $password }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_name">Nama Orang Tua</label>
                    <input class="form-control rounded-3 border-dark border-2" id="parent_name" name="parent_name" type="text" value="{{ $student->parent_name }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="parent_code">Kode Orang Tua</label>
                    <input class="form-control rounded-3 border-dark border-2" id="parent_code" name="parent_code" type="text" value="{{ $student->parent_code }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_nip">NIP Wali Kelas</label>
                    <input class="form-control rounded-3 border-dark border-2" id="teacher_nip" name="teacher_nip" type="text" value="{{ $student->teacher->nip }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="teacher_name">Nama Wali Kelas</label>
                    <input class="form-control rounded-3 border-dark border-2" id="teacher_name" name="teacher_name" type="text" value="{{ $student->teacher->user->name }}" readonly disabled>
                </div>
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