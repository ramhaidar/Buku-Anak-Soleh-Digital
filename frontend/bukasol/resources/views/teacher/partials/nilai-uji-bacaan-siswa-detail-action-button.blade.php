<div class="container-fluid w-100">
    <div class="d-flex justify-content-center w-100">
        <!-- Detail Button to Trigger Detail Modal -->
        <a class="btn btn-sm btn-warning py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-edit.index', ['id' => $gradeId]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <!-- Delete Button to Trigger Confirmation Modal -->
        <button class="btn btn-sm btn-danger py-2" onclick="showDeleteConfirmationModal({{ $gradeId }})">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>