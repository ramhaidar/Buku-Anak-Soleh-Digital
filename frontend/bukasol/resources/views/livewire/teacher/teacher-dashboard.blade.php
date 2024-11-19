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
        @switch($view)
            @case('teacher.laporan-muhasabah-harian')
                @livewire('teacher.laporan-muhasabah-harian')
            @break

            @case('teacher.laporan-muhasabah-harian-siswa')
                @livewire('teacher.laporan-muhasabah-harian-siswa')
            @break

            @case('teacher.laporan-muhasabah-harian-siswa-detail')
                @livewire('teacher.laporan-muhasabah-harian-siswa-detail')
            @break

            @case('teacher.laporan-pelanggaran-siswa')
                @livewire('teacher.laporan-pelanggaran-siswa')
            @break

            @case('teacher.laporan-pelanggaran-siswa-detail')
                @livewire('teacher.laporan-pelanggaran-siswa-detail')
            @break

            @case('teacher.laporan-pelanggaran-siswa-detail-detail')
                @livewire('teacher.laporan-pelanggaran-siswa-detail-detail')
            @break

            @case('teacher.add-laporan-pelanggaran-siswa')
                @livewire('teacher.add-laporan-pelanggaran-siswa')
            @break

            @case('teacher.laporan-bacaan-juz01')
                @livewire('teacher.laporan-bacaan-juz01')
            @break

            @case('teacher.laporan-bacaan-juz01-detail')
                @livewire('teacher.laporan-bacaan-juz01-detail')
            @break

            @case('teacher.laporan-bacaan-juz29')
                @livewire('teacher.laporan-bacaan-juz29')
            @break

            @case('teacher.laporan-bacaan-juz29-detail')
                @livewire('teacher.laporan-bacaan-juz29-detail')
            @break

            @case('teacher.laporan-bacaan-juz30')
                @livewire('teacher.laporan-bacaan-juz30')
            @break

            @case('teacher.laporan-bacaan-juz30-detail')
                @livewire('teacher.laporan-bacaan-juz30-detail')
            @break

            @case('teacher.nilai-uji-bacaan-siswa')
                @livewire('teacher.nilai-uji-bacaan-siswa')
            @break

            @case('teacher.nilai-uji-bacaan-siswa-detail')
                @livewire('teacher.nilai-uji-bacaan-siswa-detail')
            @break

            @case('teacher.add-nilai-uji-bacaan-siswa')
                @livewire('teacher.add-nilai-uji-bacaan-siswa')
            @break

            @case('teacher.edit-nilai-uji-bacaan-siswa')
                @livewire('teacher.edit-nilai-uji-bacaan-siswa')
            @break

            @case('teacher.nilai-uji-gerakan-siswa')
                @livewire('teacher.nilai-uji-gerakan-siswa')
            @break

            @case('teacher.nilai-uji-gerakan-siswa-detail')
                @livewire('teacher.nilai-uji-gerakan-siswa-detail')
            @break

            @case('teacher.add-nilai-uji-gerakan-siswa')
                @livewire('teacher.add-nilai-uji-gerakan-siswa')
            @break

            @case('teacher.edit-nilai-uji-gerakan-siswa')
                @livewire('teacher.edit-nilai-uji-gerakan-siswa')
            @break

            @case('teacher.catatan-harian-siswa')
                @livewire('teacher.catatan-harian-siswa')
            @break

            @case('teacher.catatan-harian-siswa-detail')
                @livewire('teacher.catatan-harian-siswa-detail')
            @break

            @case('teacher.catatan-harian-siswa-detail-detail')
                @livewire('teacher.catatan-harian-siswa-detail-detail')
            @break

            @case('teacher.answer-catatan-harian-siswa')
                @livewire('teacher.answer-catatan-harian-siswa')
            @break

            @case('teacher.aktivitas-membaca-siswa')
                @livewire('teacher.aktivitas-membaca-siswa')
            @break

            @case('teacher.aktivitas-membaca-siswa-detail')
                @livewire('teacher.aktivitas-membaca-siswa-detail')
            @break

            @case('change-password')
                @livewire('change-password')
            @break
        @endswitch
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

            function initializeLaporanPelanggaranSiswaTable() {
                if ($.fn.DataTable.isDataTable('#laporanPelanggaranSiswaTable')) {
                    $('#laporanPelanggaranSiswaTable').DataTable().destroy();
                }

                $('#laporanPelanggaranSiswaTable').DataTable({
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

            function initializeLaporanPelanggaranSiswaDetailTable() {
                if ($.fn.DataTable.isDataTable('#laporanPelanggaranSiswaDetailTable')) {
                    $('#laporanPelanggaranSiswaDetailTable').DataTable().destroy();
                }

                $('#laporanPelanggaranSiswaDetailTable').DataTable({
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

            function initializeLaporanBacaanJuz01() {
                if ($.fn.DataTable.isDataTable('#laporanBacaanJuz01SiswaTable')) {
                    $('#laporanBacaanJuz01SiswaTable').DataTable().destroy();
                }

                $('#laporanBacaanJuz01SiswaTable').DataTable({
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

            function initializeLaporanBacaanJuz01Detail() {
                if ($.fn.DataTable.isDataTable('#laporanBacaanJuz01SiswaDetailTable')) {
                    $('#laporanBacaanJuz01SiswaDetailTable').DataTable().destroy();
                }

                $('#laporanBacaanJuz01SiswaDetailTable').DataTable({
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

            function initializeNilaiUjiBacaanSiswa() {
                if ($.fn.DataTable.isDataTable('#nilaiUjiBacaanSiswaTable')) {
                    $('#nilaiUjiBacaanSiswaTable').DataTable().destroy();
                }

                $('#nilaiUjiBacaanSiswaTable').DataTable({
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

            function initializeNilaiUjiBacaanSiswaDetail() {
                if ($.fn.DataTable.isDataTable('#nilaiUjiBacaanSiswaDetailTable')) {
                    $('#nilaiUjiBacaanSiswaDetailTable').DataTable().destroy();
                }

                $('#nilaiUjiBacaanSiswaDetailTable').DataTable({
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

            function initializeNilaiUjiGerakanSiswa() {
                if ($.fn.DataTable.isDataTable('#nilaiUjiGerakanSiswaTable')) {
                    $('#nilaiUjiGerakanSiswaTable').DataTable().destroy();
                }

                $('#nilaiUjiGerakanSiswaTable').DataTable({
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

            function initializeNilaiUjiGerakanSiswaDetail() {
                if ($.fn.DataTable.isDataTable('#nilaiUjigerakanSiswaDetailTable')) {
                    $('#nilaiUjigerakanSiswaDetailTable').DataTable().destroy();
                }

                $('#nilaiUjigerakanSiswaDetailTable').DataTable({
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

            function initializeCatatanHarianSiswa() {
                if ($.fn.DataTable.isDataTable('#catatanHarianSiswaTable')) {
                    $('#catatanHarianSiswaTable').DataTable().destroy();
                }

                $('#catatanHarianSiswaTable').DataTable({
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

            function initializeCatatanHarianSiswaDetail() {
                if ($.fn.DataTable.isDataTable('#catatanHarianSiswaDetailTable')) {
                    $('#catatanHarianSiswaDetailTable').DataTable().destroy();
                }

                $('#catatanHarianSiswaDetailTable').DataTable({
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

            function initializeAktivitasMembacaSiswa() {
                if ($.fn.DataTable.isDataTable('#aktivitasMembacaSiswaTable')) {
                    $('#aktivitasMembacaSiswaTable').DataTable().destroy();
                }

                $('#aktivitasMembacaSiswaTable').DataTable({
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

            function initializeAktivitasMembacaSiswaDetail() {
                if ($.fn.DataTable.isDataTable('#aktivitasMembacaSiswaDetailTable')) {
                    $('#aktivitasMembacaSiswaDetailTable').DataTable().destroy();
                }

                $('#aktivitasMembacaSiswaDetailTable').DataTable({
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
                    initializeLaporanMuhasabahHarianTable();
                } else if (view === 'teacher.laporan-muhasabah-harian-siswa') {
                    initializeLaporanMuhasabahHarianSiswaTable();
                } else if (view === 'teacher.laporan-pelanggaran-siswa') {
                    initializeLaporanPelanggaranSiswaTable();
                } else if (view === 'teacher.laporan-pelanggaran-siswa-detail') {
                    initializeLaporanPelanggaranSiswaDetailTable();
                } else if (view === 'teacher.laporan-bacaan-juz01') {
                    initializeLaporanBacaanJuz01();
                } else if (view === 'teacher.laporan-bacaan-juz01-detail') {
                    initializeLaporanBacaanJuz01Detail();
                } else if (view === 'teacher.laporan-bacaan-juz29') {
                    initializeLaporanBacaanJuz29();
                } else if (view === 'teacher.laporan-bacaan-juz29-detail') {
                    initializeLaporanBacaanJuz29Detail();
                } else if (view === 'teacher.laporan-bacaan-juz30') {
                    initializeLaporanBacaanJuz30();
                } else if (view === 'teacher.laporan-bacaan-juz30-detail') {
                    initializeLaporanBacaanJuz30Detail();
                } else if (view === 'teacher.nilai-uji-bacaan-siswa') {
                    initializeNilaiUjiBacaanSiswa();
                } else if (view === 'teacher.nilai-uji-bacaan-siswa-detail') {
                    initializeNilaiUjiBacaanSiswaDetail();
                } else if (view === 'teacher.nilai-uji-gerakan-siswa') {
                    initializeNilaiUjiGerakanSiswa();
                } else if (view === 'teacher.nilai-uji-gerakan-siswa-detail') {
                    initializeNilaiUjiGerakanSiswaDetail();
                } else if (view === 'teacher.catatan-harian-siswa') {
                    initializeCatatanHarianSiswa();
                } else if (view === 'teacher.catatan-harian-siswa-detail') {
                    initializeCatatanHarianSiswaDetail();
                } else if (view === 'teacher.aktivitas-membaca-siswa') {
                    initializeAktivitasMembacaSiswa();
                } else if (view === 'teacher.aktivitas-membaca-siswa-detail') {
                    initializeAktivitasMembacaSiswaDetail();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            Livewire.on('viewSwitched', (data) => {
                console.log('View switched to:', data.view);
            });
        });
    </script>
@endpush
