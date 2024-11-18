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
        @if ($view === 'teacher.laporan-muhasabah-harian')
            @livewire('teacher.laporan-muhasabah-harian')
        @elseif ($view === 'teacher.laporan-muhasabah-harian-siswa')
            @livewire('teacher.laporan-muhasabah-harian-siswa')
        @elseif ($view === 'teacher.laporan-muhasabah-harian-siswa-detail')
            @livewire('teacher.laporan-muhasabah-harian-siswa-detail')
        @elseif ($view === 'admin.add-teacher')
            @livewire('teacher.add-teacher')
        @elseif ($view === 'change-password')
            @livewire('change-password')
        @endif
    </div>
</div>

@push('scripts')
    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initializeLaporanMuhasabahHarianTable() {
                if ($.fn.DataTable.isDataTable('#laporanMuhasabahHarianTable')) {
                    $('#laporanMuhasabahHarianTable').DataTable().destroy();
                }

                $('#laporanMuhasabahHarianTable').DataTable({
                    info: true,
                    ordering: true,
                    order: [],
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

            function initializeLaporanMuhasabahHarianSiswaTable() {
                if ($.fn.DataTable.isDataTable('#laporanMuhasabahHarianSiswaTable')) {
                    $('#laporanMuhasabahHarianSiswaTable').DataTable().destroy();
                }

                $('#laporanMuhasabahHarianSiswaTable').DataTable({
                    info: true,
                    ordering: true,
                    order: [],
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

            // Event Listener untuk perubahan view
            window.addEventListener('viewSwitched', (event) => {
                const view = event.detail.view;

                if (view === 'teacher.laporan-muhasabah-harian') {
                    console.log('Switched to laporan muhasabah harian');
                    initializeLaporanMuhasabahHarianTable();
                } else if (view === 'teacher.laporan-muhasabah-harian-siswa') {
                    console.log('Switched to laporan muhasabah harian siswa');
                    initializeLaporanMuhasabahHarianSiswaTable();
                }
            });
        });
    </script>

    @script
        <script>
            // $this->dispatch ( 'message', "View switched to {$view}" );
            $wire.on('viewSwitched', (view) => {
                console.log('Wire: View switched to', view);
            });
        </script>
    @endscript
@endpush
