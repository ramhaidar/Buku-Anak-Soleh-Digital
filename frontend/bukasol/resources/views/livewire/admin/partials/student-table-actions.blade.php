<style>
    .student-detail .field {
        margin-bottom: 1rem;
    }

    .student-detail .field label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.25rem;
    }

    .student-detail .field p {
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
        <button class="btn btn-sm btn-primary py-2 me-2" onclick="showStudentDetailModal({{ $student->id }})">
            <i class="fa fa-eye"></i>
        </button>

        <!-- Delete Button to Trigger Confirmation Modal -->
        <button class="btn btn-sm btn-danger py-2" onclick="showDeleteConfirmationModal({{ $student->id }})">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>

<script>
    function showStudentDetailModal(studentId) {
        // Show loading message while fetching data
        document.getElementById('studentDetailContent').innerHTML = '<p>Loading...</p>';

        // Fetch student details via AJAX
        fetch(`/students/${studentId}`)
            .then(response => response.json())
            .then(data => {
                // Populate modal content with student details in the specified design
                const content = `
<div class="student-detail">
<div class="field">
<label>NISN</label>
<p>${data.nisn}</p>
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
<div class="field">
<label>Nama Orang Tua</label>
<p>${data.parent_name}</p>
</div>
<div class="field">
<label>Kode Orang Tua</label>
<p>${data.parent_code}</p>
</div>
<div class="field">
<label>NIP Wali Kelas</label>
<p>${data.teacher.nip}</p>
</div>
<div class="field">
<label>Nama Wali Kelas</label>
<p>${data.teacher.user.name}</p>
</div>
</div>
`;
                document.getElementById('studentDetailContent').innerHTML = content;

                // Show the modal
                const studentDetailModal = new bootstrap.Modal(document.getElementById('studentDetailModal'));
                studentDetailModal.show();
            })
            .catch(error => {
                console.error('Error fetching student details:', error);
                document.getElementById('studentDetailContent').innerHTML = '<p>Error loading data. Please try again later.</p>';
            });
    }
</script>
