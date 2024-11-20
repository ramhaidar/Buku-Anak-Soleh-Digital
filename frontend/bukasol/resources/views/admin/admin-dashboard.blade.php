@extends('dashboard')

@push('styles')
    <!-- DataTables 2.1.8 -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content_2')
    {{-- <div class="d-flex flex-grow-1 align-content-center justify-content-center"> --}}
    {{-- <div class="flex-grow-1 align-content-center justify-content-center p-0 m-0 px-4 pb-3"> --}}
    @yield('content_3')
    {{-- @if ($view === 'admin.teacher-table')
            @livewire('admin.teacher-table')
        @elseif ($view === 'admin.student-table')
            @livewire('admin.student-table')
        @elseif ($view === 'admin.add-student')
            @livewire('admin.add-student')
        @elseif ($view === 'admin.add-teacher')
            @livewire('admin.add-teacher')
        @elseif ($view === 'change-password')
            @livewire('change-password')
        @endif --}}

    {{-- @include('livewire.admin.partials.teacher-table-details')
            @include('livewire.admin.partials.teacher-table-delete')

            @include('livewire.admin.partials.student-table-details')
            @include('livewire.admin.partials.student-table-delete') --}}
    {{-- </div> --}}
    {{-- </div> --}}
@endsection

@push('scripts')
    <!-- DataTables 2.1.8 -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
@endpush
