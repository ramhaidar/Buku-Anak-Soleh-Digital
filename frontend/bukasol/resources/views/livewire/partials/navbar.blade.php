@push('styles')
    <style>
        .navbar-nav .nav-item .d-flex {
            position: initial;
            left: initial;
        }

        .navigation-button {
            width: 100px;
        }

        #ProfilePhoto {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        #profileDropdown .ms-2.me-2 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100dvw;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: grey;
            color: white;
        }

        .dropdown-menu li {
            position: relative;
        }

        /* Submenu styling for Laporan Bacaan Juz */
        .dropdown-menu .dropdown-submenu {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu .dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
            display: none;
            margin-top: 0;
        }

        /* Display sub-submenu on hover */
        .dropdown-menu .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .nav-item {
            display: block;
        }

        /* Desktop view - hide accordion, show dropdowns */
        @media (min-width: 769px) {

            .accordion-menu,
            .mobile-profile-section {
                display: none;
            }
        }

        /* Mobile view - hide dropdowns, show accordion and profile section */
        @media (max-width: 768px) {

            .dropdown-menu,
            .dropdown,
            .nav-item {
                display: none;
            }

            .accordion-menu,
            .mobile-profile-section {
                display: block;
                width: 100%;
            }

            .accordion-button {
                width: 100%;
                text-align: left;
            }

            .accordion-collapse {
                width: 100%;
            }

            .nav-item {
                width: 100%;
            }
        }
    </style>
@endpush

<header class="navbar navbar-expand-md navbar-light bg-light border-bottom mb-0 mx-0 px-3 pt-3" style="align-items: center">
    <div class="container-fluid p-0 m-0" style="min-width: 100%; align-items: center">
        <a class="navbar-brand p-0 m-0" href="#">
            <h4 class="poppins-bold p-0 m-0">SD AR-RAFI</h4>
        </a>

        <button class="navbar-toggler p-0 m-0" data-bs-toggle="collapse" data-bs-target="#navbarContent" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon p-0 m-0"></span>
        </button>

        <div class="collapse navbar-collapse p-0 m-0" id="navbarContent" style="align-items: center">
            <ul class="navbar-nav ms-auto w-100" style="justify-content: center">
                @if (isset($role) && $role == 'Admin')
                    <!-- Admin Navbar for Desktop View -->
                    <li class="nav-item px-2 mb-2" id="FirstItem">
                        <a class="btn btn-secondary navigation-button" wire:click="$dispatch('switchView', { view: 'admin.student-table' })">
                            Siswa
                        </a>
                    </li>
                    <li class="nav-item px-2 mb-2">
                        <a class="btn btn-secondary navigation-button" wire:click="$dispatch('switchView', { view: 'admin.teacher-table' })">
                            Guru
                        </a>
                    </li>

                    <!-- Accordion Menu for Mobile View -->
                    <div class="accordion accordion-menu mt-3" id="adminAccordion">
                        <!-- Siswa Section -->
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header " id="headingSiswa">
                                <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-2 my-1 fs-6 bg-success-subtle" data-bs-toggle="collapse" data-bs-target="#collapseSiswa" type="button" aria-expanded="false" aria-controls="collapseSiswa" wire:click="$dispatch('switchView', { view: 'admin.student-table' })">
                                    Siswa
                                </a>
                            </h2>
                        </div>

                        <!-- Guru Section -->
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingGuru">
                                <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-1 my-1 fs-6 bg-success-subtle" data-bs-toggle="collapse" data-bs-target="#collapseSiswa" type="button" aria-expanded="false" aria-controls="collapseSiswa" wire:click="$dispatch('switchView', { view: 'admin.teacher-table' })">
                                    Guru
                                </a>
                            </h2>
                        </div>
                    </div>
                @elseif (isset($role) && $role == 'Teacher')
                    <!-- Dropdown Menu for Desktop View -->
                    <li class="dropdown px-2 mb-2" id="FirstItem">
                        <button class="nav-item btn btn-secondary navigation-button" id="laporanDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
                            <li><button class="dropdown-item" wire:click="$dispatch('switchView', { view: 'teacher.laporan-muhasabah-siswa' })">Laporan Muhasabah Siswa</button></li>
                            <li><a class="dropdown-item" href="#">Laporan Pelanggaran Siswa</a></li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item submenu-toggle" href="#">Laporan Bacaan Juz &raquo;</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Laporan Bacaan Juz 1 Siswa</a></li>
                                    <li><a class="dropdown-item" href="#">Laporan Bacaan Juz 29 Siswa</a></li>
                                    <li><a class="dropdown-item" href="#">Laporan Bacaan Juz 30 Siswa</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown px-2 mb-2">
                        <button class="nav-item btn btn-secondary navigation-button" id="nilaiDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Nilai
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="nilaiDropdown">
                            <li><a class="dropdown-item" href="#">Nilai Uji Gerakan Siswa</a></li>
                            <li><a class="dropdown-item" href="#">Nilai Uji Bacaan Siswa</a></li>
                        </ul>
                    </li>

                    <li class="dropdown px-2 mb-2">
                        <button class="nav-item btn btn-secondary navigation-button" id="aktivitasDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Aktivitas
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="aktivitasDropdown">
                            <li><a class="dropdown-item" href="#">Catatan Harian Siswa</a></li>
                            <li><a class="dropdown-item" href="#">Aktivitas Membaca Siswa</a></li>
                        </ul>
                    </li>

                    <!-- Accordion Menu for Mobile View -->
                    <div class="accordion accordion-menu mt-3" id="teacherAccordion">
                        <!-- Laporan Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingLaporan">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLaporan" type="button" aria-expanded="false" aria-controls="collapseLaporan">
                                    Laporan
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapseLaporan" aria-labelledby="headingLaporan">
                                <div class="accordion-body">
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Laporan Muhasabah Siswa</a>
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Laporan Pelanggaran Siswa</a>
                                    <div class="accordion" id="juzAccordion">
                                        <div class="accordion-item rounded-0">
                                            <h2 class="accordion-header rounded-0" id="headingJuz">
                                                <button class="accordion-button collapsed rounded-0 fs-6 ps-3 ms-0" data-bs-toggle="collapse" data-bs-target="#collapseJuz" type="button" aria-expanded="false" aria-controls="collapseJuz">
                                                    Laporan Bacaan Juz
                                                </button>
                                            </h2>
                                            <div class="accordion-collapse collapse" id="collapseJuz" aria-labelledby="headingJuz">
                                                <div class="accordion-body">
                                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Laporan Bacaan Juz 1 Siswa</a>
                                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Laporan Bacaan Juz 29 Siswa</a>
                                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Laporan Bacaan Juz 30 Siswa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nilai Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNilai">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseNilai" type="button" aria-expanded="false" aria-controls="collapseNilai">
                                    Nilai
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapseNilai" aria-labelledby="headingNilai">
                                <div class="accordion-body">
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Nilai Uji Gerakan Siswa</a>
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Nilai Uji Bacaan Siswa</a>
                                </div>
                            </div>
                        </div>

                        <!-- Aktivitas Section -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingAktivitas">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseAktivitas" type="button" aria-expanded="false" aria-controls="collapseAktivitas">
                                    Aktivitas
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" id="collapseAktivitas" aria-labelledby="headingAktivitas">
                                <div class="accordion-body">
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Catatan Harian Siswa</a>
                                    <a class="dropdown-item accordion-item container-fluid p-3 w-100 h-100 border-secondary-subtle rounded-0 fs-6 bg-success-subtle" href="#">Aktivitas Membaca Siswa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (isset($role) && $role == 'Student')
                    <li class="nav-item px-2 mb-2">
                        <a class="btn btn-secondary navigation-button" wire:click='#'>Laporan</a>
                    </li>
                    <li class="nav-item px-2 mb-2">
                        <a class="btn btn-secondary navigation-button" wire:click='#'>Aktivitas</a>
                    </li>
                    <li class="nav-item px-2 mb-2">
                        <a class="btn btn-secondary navigation-button" wire:click='#'>Nilai</a>
                    </li>
                @endif
            </ul>

            <!-- Profile Section for Desktop -->
            <ul class="navbar-nav ms-auto mt-0 d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <img id="ProfilePhoto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile Photo">
                        <span class="ms-3">—</span>
                        <span class="ms-2 me-2">{{ isset($name) ? $name : 'NAME' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="profileDropdown">
                        <li class="">
                            <button class="dropdown-item p-1 m-0 my-0" wire:click="$dispatch('switchView', { view: 'change-password' })">Ganti Password</button>
                            <div class="dropdown-divider border-0 bg-white p-0 m-0"></div>
                            <form class="p-0 m-0" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class=" p-1 m-0 my-0 dropdown-item" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Profile Section for Mobile as an Accordion -->
            <div class="accordion mobile-profile-section d-md-none mt-3">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingProfile">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseProfile" type="button" aria-expanded="false" aria-controls="collapseProfile">
                            <img id="ProfilePhoto" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile Photo">
                            <span class="ms-3">—</span>
                            <span class="ms-2 me-2">{{ isset($name) ? $name : 'NAME' }}</span>
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseProfile" aria-labelledby="headingProfile">
                        <div class="accordion-body">
                            <button class="btn bg-danger-subtle w-100" wire:click="$dispatch('switchView', { view: 'change-password' })">Ganti Password</button>
                            <div class="dropdown-divider border-0 bg-white p-0 m-0 pt-2"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn bg-danger-subtle w-100" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
@endpush
