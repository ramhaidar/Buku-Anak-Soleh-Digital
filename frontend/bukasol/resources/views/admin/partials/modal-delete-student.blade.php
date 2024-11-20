<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteStudentConfirmationModal" aria-labelledby="deleteStudentConfirmationModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentConfirmationModalLabel">Konfirmasi Hapus Data</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="p-0 m-0">Apakah Anda yakin ingin menghapus data siswa ini?</p>
                <p class="p-0 m-0">Peringatan: Aksi ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</button>
                <button class="btn btn-danger" type="button" onclick="confirmDelete(deleteStudentId, '#studentTable')">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteStudentId;

    // Function to show delete confirmation modal and store the student ID
    function showDeleteConfirmationModal(studentId) {
        deleteStudentId = studentId;
        const deleteStudentConfirmationModal = new bootstrap.Modal(document.getElementById('deleteStudentConfirmationModal'));
        deleteStudentConfirmationModal.show();
    }

    // Function to handle delete confirmation with AJAX
    function confirmDelete(deleteStudentId, tableId) {
        const deleteUrl = `{{ route('students.destroy', ':id') }}`.replace(':id', deleteStudentId);

        // Close the delete confirmation modal
        const deleteStudentConfirmationModalEl = document.getElementById('deleteStudentConfirmationModal');
        const deleteStudentConfirmationModal = bootstrap.Modal.getInstance(deleteStudentConfirmationModalEl) || new bootstrap.Modal(deleteStudentConfirmationModalEl);
        deleteStudentConfirmationModal.hide();

        // Perform the delete request with AJAX
        fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message and pass the tableId to reload the specific table
                    window.showAlert(data.success, true, tableId);
                } else if (data.error) {
                    // Show error message and pass the tableId to reload the specific table
                    window.showAlert(data.error, false, tableId);
                }
            })
            .catch(error => {
                // Show error message if AJAX request fails and pass the tableId to reload the specific table
                window.showAlert('An error occurred while deleting the data. Please try again.', false, tableId);
                console.error('Error:', error);
            });
    }
</script>
