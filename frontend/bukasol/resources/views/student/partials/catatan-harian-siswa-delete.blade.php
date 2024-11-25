<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteCatatanHarianSiswaConfirmationModal" aria-labelledby="deleteCatatanHarianSiswaConfirmationModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCatatanHarianSiswaConfirmationModalLabel">Konfirmasi Hapus Data</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="p-0 m-0">Apakah Anda yakin ingin menghapus data catatan harian siswa ini?</p>
                <p class="p-0 m-0">Peringatan: Aksi ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</a>
                    <button class="btn btn-danger" data-bs-dismiss="modal" type="button" onclick="confirmDelete(deleteNoteId, '#catatanHarianSiswaTable')">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteNoteId;

    function showDeleteConfirmationModal(noteId) {
        deleteNoteId = noteId;
        const deleteGradeConfirmationModal = new bootstrap.Modal(document.getElementById('deleteCatatanHarianSiswaConfirmationModal'));
        deleteGradeConfirmationModal.show();
    }

    function confirmDelete(deleteNoteId, tableId) {
        const deleteUrl = `{{ route('activity-notes.delete', ':id') }}`.replace(':id', deleteNoteId);

        fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                const deleteModalEl = document.getElementById('deleteCatatanHarianSiswaConfirmationModal');
                const deleteModal = bootstrap.Modal.getInstance(deleteModalEl);

                if (deleteModal) {
                    deleteModal.hide(); // Close the modal after success or error
                }

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
