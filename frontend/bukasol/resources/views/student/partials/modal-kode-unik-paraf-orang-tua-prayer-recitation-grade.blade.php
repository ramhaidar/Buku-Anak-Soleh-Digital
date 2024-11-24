<!-- Modal -->
<div class="modal fade" id="kodeUnikModal" aria-labelledby="kodeUnikModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kodeUnikModalLabel">Masukkan Kode Unik Orang Tua</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="kodeUnikForm">
                    <div class="mb-3">
                        <label class="form-label" for="kodeUnikInput">Kode Unik</label>
                        <input class="form-control" id="kodeUnikInput" type="text" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Batal</a>
                <button class="btn btn-primary" form="kodeUnikForm" type="submit">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
    var parentSignGradeId;

    function showParentCodeModal(gradeId) {
        parentSignGradeId = gradeId;
        const parentSignConfirmationModal = new bootstrap.Modal(document.getElementById('kodeUnikModal'));
        parentSignConfirmationModal.show();
    }

    document.getElementById('kodeUnikForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const kodeUnik = document.getElementById('kodeUnikInput').value;
        const url = `{{ route('prayer-recitation-grade.parent-sign', ':id') }}`.replace(':id', parentSignGradeId);

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                parentCode: kodeUnik
            })
        })
        .then(response => response.json())
        .then(data => {
            const parentSignConfirmationModal = bootstrap.Modal.getInstance(document.getElementById('kodeUnikModal'));
            parentSignConfirmationModal.hide();
            document.getElementById('kodeUnikForm').reset();

            if (data.success) {
                window.showAlert(data.success, true, '#nilaiUjiBacaanSiswaDetailTable');
            } else if (data.error) {
                window.showAlert(data.error, false, '#nilaiUjiBacaanSiswaDetailTable');
            }
        })
        .catch(error => {
            const parentSignConfirmationModal = bootstrap.Modal.getInstance(document.getElementById('kodeUnikModal'));
            parentSignConfirmationModal.hide();
            document.getElementById('kodeUnikForm').reset();
            
            window.showAlert('An error occurred while deleting the data. Please try again.', false);
        });
    });
    
</script>