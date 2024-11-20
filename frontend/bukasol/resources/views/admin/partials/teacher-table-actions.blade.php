<style>
    .teacher-detail .field {
        margin-bottom: 1rem;
    }

    .teacher-detail .field label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.25rem;
    }

    .teacher-detail .field p {
        background-color: black;
        color: white;
        padding: 0.5rem;
        border-radius: 8px;
        font-size: 1rem;
        margin: 0;
    }

    /* Center the modal */
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container-fluid w-100">
    <div class="d-flex justify-content-center w-100">
        <!-- Detail Button to Trigger Detail Modal -->
        <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('admin.teacher-detail.index', ['id' => $teacher->id]) }}">
            <i class="fa fa-eye"></i>
        </a>

        <!-- Delete Button to Trigger Confirmation Modal -->
        <button class="btn btn-sm btn-danger py-2" onclick="showDeleteConfirmationModal({{ $teacher->id }})">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>
