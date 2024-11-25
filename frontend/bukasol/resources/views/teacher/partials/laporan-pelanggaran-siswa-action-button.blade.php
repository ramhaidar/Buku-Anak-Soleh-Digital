<div class="container-fluid w-100">
    <div class="d-flex justify-content-center w-100">
        <!-- Detail Button to Trigger Detail Modal -->
        <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.laporan-pelanggaran-siswa-detail.index', ['id' => $reportId]) }}">
            <i class="fa fa-eye"></i>
        </a>
        <button class="btn btn-sm btn-danger py-2 me-2" onclick="showDeleteConfirmationModal({{ $reportId }})">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</div>