<div class="container-fluid w-100">
    <div class="d-flex justify-content-center w-100">
        <!-- Detail Button to Trigger Detail Modal -->
        <a class="btn btn-sm btn-primary py-2 me-2" href="{{ route('teacher.nilai-uji-bacaan-siswa-detail.index', ['id' => $studentId]) }}">
            <i class="fa fa-eye"></i>
        </a>

        <!-- Delete Button to Trigger Confirmation Modal -->
        <a class="btn btn-sm btn-success py-2 me-2" href="{{ route('prayer-recitation-grade.convert-pdf', ['id' => $studentId]) }}">
            <i class="fa fa-file-export"></i>
        </a>
    </div>
</div>