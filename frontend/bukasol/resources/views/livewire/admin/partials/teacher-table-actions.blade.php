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
        <button class="btn btn-sm btn-primary py-2 me-2" onclick="showTeacherDetailModal({{ $teacher->id }})">
            <i class="fa fa-eye"></i>
        </button>

        <!-- Delete Button to Trigger Confirmation Modal -->
        <button class="btn btn-sm btn-danger py-2" onclick="showDeleteConfirmationModal({{ $teacher->id }})">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>

<script>
    function showTeacherDetailModal(teacherId) {
        // Show loading message while fetching data
        document.getElementById('teacherDetailContent').innerHTML = '<p>Loading...</p>';

        // Fetch teacher details via AJAX
        fetch(`/teachers/${teacherId}`)
            .then(response => response.json())
            .then(data => {
                // Populate modal content with teacher details in the specified design
                const content = `
<div class="teacher-detail">
<div class="field">
<label>NIP</label>
<p>${data.nip}</p>
</div>
<div class="field">
<label>Nama</label>
<p>${data.user.name}</p>
</div>
<div class="field">
<label>Kelas</label>
<p>${data.class_name}</p>
</div>
<div class="field">
<label>Username</label>
<p>${data.user.username}</p>
</div>
<div class="field">
<label>Password</label>
<p>${data.user.password ?? '*******'}</p>
</div>
</div>
`;
                document.getElementById('teacherDetailContent').innerHTML = content;

                // Show the modal
                const teacherDetailModal = new bootstrap.Modal(document.getElementById('teacherDetailModal'));
                teacherDetailModal.show();
            })
            .catch(error => {
                console.error('Error fetching teacher details:', error);
                document.getElementById('teacherDetailContent').innerHTML = '<p>Error loading data. Please try again later.</p>';
            });
    }
</script>
