<!-- Modal for Add Student Method -->
<div class="modal fade" id="addStudentModal" aria-labelledby="addStudentModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Pilih Metode Menambahkan Akun</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-around">
                    <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Import Excel</button>
                    <a class="btn btn-outline-success" type="button" href="{{ route('admin.student-add.index') }}">Tambah Manual</a>
                </div>
            </div>
        </div>
    </div>
</div>
