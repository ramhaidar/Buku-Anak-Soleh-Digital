@push('styles')
    <!-- DataTables 2.1.8 -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        .dashboard-content-wrapper {
            flex: 1 0 auto;
            padding-top: 0px;
            overflow-y: auto;
            height: calc(100vh - 115px);
        }
    </style>
@endpush

<div class="d-flex flex-grow-1 align-content-center justify-content-center">
    <div class="flex-grow-1 align-content-center justify-content-center p-0 m-0 px-4 pb-3">
        @if ($view === 'teacher-table')
            @livewire('admin.teacher-table')
        @elseif ($view === 'student-table')
            @livewire('admin.student-table')
        @elseif ($view === 'change-password')
            @livewire('admin.change-password')
        @endif
    </div>
</div>

@push('scripts')
    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initializeDataTable() {
                if ($.fn.DataTable.isDataTable('#teacherTable')) {
                    $('#teacherTable').DataTable().destroy();
                }

                $('#teacherTable').DataTable({
                    processing: true,
                    serverSide: true,
                    paging: true,
                    ajax: {
                        url: '{{ route('teacher.fetchData') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    columns: [{
                            data: 'nip',
                            name: 'nip'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'class_name',
                            name: 'class_name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],
                    language: {
                        paginate: {
                            first: '<i class="bi bi-chevron-double-left container-fluid"></i>',
                            previous: '<i class="bi bi-chevron-left container-fluid"></i>',
                            next: '<i class="bi bi-chevron-right container-fluid"></i>',
                            last: '<i class="bi bi-chevron-double-right container-fluid"></i>'
                        }
                    }
                });
            }

            // Initialize DataTable on viewSwitched
            window.addEventListener('viewSwitched', () => {
                initializeDataTable();
            });
        });
    </script>

    @script
        <script>
            // $this->dispatch ( 'message', "View switched to {$view}" );
            $wire.on('viewSwitched', (view) => {
                console.log('View switched to', view);
            });
        </script>
    @endscript
@endpush
