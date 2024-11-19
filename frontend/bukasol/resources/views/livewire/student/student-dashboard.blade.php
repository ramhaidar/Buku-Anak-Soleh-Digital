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
            @case('student.laporan-muhasabah-harian')
                @livewire('student.laporan-muhasabah-harian')
            @break

            @case('student.laporan-muhasabah-harian-detail')
                @livewire('student.laporan-muhasabah-harian-detail')
            @break

            @case('student.add-laporan-muhasabah-harian')
                @livewire('student.add-laporan-muhasabah-harian')
            @break

            @case('student.laporan-pelanggaran-siswa')
                @livewire('student.laporan-pelanggaran-siswa')
            @break

            @case('student.laporan-pelanggaran-siswa-detail')
                @livewire('student.laporan-pelanggaran-siswa-detail')
            @break

            @case('student.laporan-pelanggaran-siswa-detail-detail')
                @livewire('student.laporan-pelanggaran-siswa-detail-detail')
            @break

            @case('student.add-laporan-pelanggaran-siswa')
                @livewire('student.add-laporan-pelanggaran-siswa')
            @break

            @case('student.laporan-bacaan-juz01')
                @livewire('student.laporan-bacaan-juz01')
            @break

            @case('student.add-laporan-bacaan-juz-01')
                @livewire('student.add-laporan-bacaan-juz-01')
            @break

            @case('student.laporan-bacaan-juz29')
                @livewire('student.laporan-bacaan-juz29')
            @break

            @case('student.laporan-bacaan-juz29-detail')
                @livewire('student.laporan-bacaan-juz29-detail')
            @break

            @case('student.laporan-bacaan-juz30')
                @livewire('student.laporan-bacaan-juz30')
            @break

            @case('student.laporan-bacaan-juz30-detail')
                @livewire('student.laporan-bacaan-juz30-detail')
            @break

            @case('student.nilai-uji-bacaan-siswa')
                @livewire('student.nilai-uji-bacaan-siswa')
            @break

            @case('student.nilai-uji-bacaan-siswa-detail')
                @livewire('student.nilai-uji-bacaan-siswa-detail')
            @break

            @case('student.add-nilai-uji-bacaan-siswa')
                @livewire('student.add-nilai-uji-bacaan-siswa')
            @break

            @case('student.edit-nilai-uji-bacaan-siswa')
                @livewire('student.edit-nilai-uji-bacaan-siswa')
            @break

            @case('student.nilai-uji-gerakan-siswa')
                @livewire('student.nilai-uji-gerakan-siswa')
            @break

            @case('student.nilai-uji-gerakan-siswa-detail')
                @livewire('student.nilai-uji-gerakan-siswa-detail')
            @break

            @case('student.add-nilai-uji-gerakan-siswa')
                @livewire('student.add-nilai-uji-gerakan-siswa')
            @break

            @case('student.edit-nilai-uji-gerakan-siswa')
                @livewire('student.edit-nilai-uji-gerakan-siswa')
            @break

            @case('student.catatan-harian-siswa')
                @livewire('student.catatan-harian-siswa')
            @break

            @case('student.catatan-harian-siswa-detail')
                @livewire('student.catatan-harian-siswa-detail')
            @break

            @case('student.add-catatan-harian-siswa')
                @livewire('student.add-catatan-harian-siswa')
            @break

            @case('student.answer-catatan-harian-siswa')
                @livewire('student.answer-catatan-harian-siswa')
            @break

            @case('student.aktivitas-membaca-siswa')
                @livewire('student.aktivitas-membaca-siswa')
            @break

            @case('student.aktivitas-membaca-siswa-detail')
                @livewire('student.aktivitas-membaca-siswa-detail')
            @break

            @case('student.add-aktivitas-membaca-siswa')
                @livewire('student.add-aktivitas-membaca-siswa')
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

                if (view === 'student.laporan-muhasabah-harian') {
                    console.log('Switched to laporan muhasabah harian');
                    initializeLaporanMuhasabahHarianTable();
                } else if (view === 'student.laporan-pelanggaran-siswa') {
                    console.log('Switched to laporan pelanggaran siswa');
                    initializeLaporanPelanggaranSiswaTable();
                } else if (view === 'student.laporan-pelanggaran-siswa-detail') {
                    console.log('Switched to laporan pelanggaran siswa detail');
                    initializeLaporanPelanggaranSiswaDetailTable();
                } else if (view === 'student.laporan-bacaan-juz01') {
                    console.log('Switched to laporan bacaan juz 01');
                    initializeLaporanBacaanJuz01();
                } else if (view === 'student.laporan-bacaan-juz01-detail') {
                    console.log('Switched to laporan bacaan juz 01 detail');
                    initializeLaporanBacaanJuz01Detail();
                } else if (view === 'student.laporan-bacaan-juz29') {
                    console.log('Switched to laporan bacaan juz 29');
                    initializeLaporanBacaanJuz29();
                } else if (view === 'student.laporan-bacaan-juz29-detail') {
                    console.log('Switched to laporan bacaan juz 29 detail');
                    initializeLaporanBacaanJuz29Detail();
                } else if (view === 'student.laporan-bacaan-juz30') {
                    console.log('Switched to laporan bacaan juz 30');
                    initializeLaporanBacaanJuz30();
                } else if (view === 'student.laporan-bacaan-juz30-detail') {
                    console.log('Switched to laporan bacaan juz 30 detail');
                    initializeLaporanBacaanJuz30Detail();
                } else if (view === 'student.nilai-uji-bacaan-siswa') {
                    console.log('Switched to nilai uji bacaan siswa');
                    initializeNilaiUjiBacaanSiswa();
                } else if (view === 'student.nilai-uji-bacaan-siswa-detail') {
                    console.log('Switched to nilai uji bacaan siswa detail');
                    initializeNilaiUjiBacaanSiswaDetail();
                } else if (view === 'student.nilai-uji-gerakan-siswa') {
                    console.log('Switched to nilai uji gerakan siswa');
                    initializeNilaiUjiGerakanSiswa();
                } else if (view === 'student.nilai-uji-gerakan-siswa-detail') {
                    console.log('Switched to nilai uji gerakan siswa detail');
                    initializeNilaiUjiGerakanSiswaDetail();
                } else if (view === 'student.catatan-harian-siswa') {
                    console.log('Switched to catatan harian siswa');
                    initializeCatatanHarianSiswa();
                } else if (view === 'student.catatan-harian-siswa-detail') {
                    console.log('Switched to catatan harian siswa detail');
                    initializeCatatanHarianSiswaDetail();
                } else if (view === 'student.aktivitas-membaca-siswa') {
                    console.log('Switched to aktivitas membaca siswa');
                    initializeAktivitasMembacaSiswa();
                } else if (view === 'student.aktivitas-membaca-siswa-detail') {
                    console.log('Switched to aktivitas membaca siswa detail');
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
