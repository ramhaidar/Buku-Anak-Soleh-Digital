<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom mx-5 pt-3">
    <div class="col-md-3 p-0 m-0 text-start">
        {{-- <h4>{{ isset($role) ? $role : 'ROLE' }}</h4> --}}
        <h4 class="pt-2 poppins-bold">SD AR-RAFI</h4>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            {{-- SET BUTTON BASE ON ROLE --}}
            @if (isset($role) && $role == 'SUPERADMIN')
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='showStudentTable'>Siswa</a>
                </li>
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='showTeacherTable'>Guru</a>
                </li>
            @elseif (isset($role) && $role == 'TEACHER')
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Laporan</a>
                </li>
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Aktivitas</a>
                </li>
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Nilai</a>
                </li>
            @elseif (isset($role) && $role == 'STUDENT')
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Laporan</a>
                </li>
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Aktivitas</a>
                </li>
                <li class="px-2">
                    <a class="btn btn-secondary px-3" wire:click='#'>Nilai</a>
                </li>
            @endif
        </ul>
    </ul>

    <style>
        .outer-border {
            width: 60px;
            /* Slightly larger than the inner container */
            height: 60px;
            /* Slightly larger than the inner container */
            padding: 5px;
            /* Space between outer border and inner image */
            border: 2px solid black;
            /* Black border */
            border-radius: 50%;
            /* Makes the outer container rounded */
            display: flex;
            /* Center the inner container */
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
        }

        .icon-wrapper {
            width: 60px;
            /* Adjust the width as needed */
            height: 60px;
            /* Adjust the height as needed */
            overflow: hidden;
            /* Crop the image to stay within the border */
            border-radius: 50%;
            /* Makes the image circular */
            display: flex;
            /* Center the image inside */
            align-items: center;
            /* Center vertically */
            justify-content: center;
        }

        #ProfilePhoto {
            width: 100%;
            /* Make the image take up full width of the container */
            height: 100%;
            /* Make the image take up full height of the container */
            object-fit: cover;
        }
    </style>

    <div class="col-md-3 text-end d-flex justify-content-end">
        <div class="col float-end text-end">
            <div class="row d-flex align-items-end align-content-end justify-content-end">
                <div class="col-auto align-content-center align-items-center justify-content-center">
                    <div class="outer-border">
                        <div class="col icon-wrapper mb-1">
                            <i class="fa-solid fa-user-tie" id="ProfilePhoto"></i>
                        </div>
                    </div>
                </div>
                <div class="col-1 p-0 m-0 ps-2">
                    <p>—</p>
                </div>
                <div class="col-auto mt-2">
                    <p class="">{{ isset($name) ? $name : 'NAME' }}</p>
                </div>
            </div>
        </div>

        {{-- <button class="btn btn-outline-primary me-2" type="button">Login</button>
        <button class="btn btn-primary" type="button">Sign-up</button> --}}
    </div>
</header>
