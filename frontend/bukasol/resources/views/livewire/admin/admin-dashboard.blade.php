@push('styles')
    <style>
        .dashboard-content-wrapper {
            flex: 1 0 auto;
            padding-top: 0px;
            overflow-y: auto;
            height: calc(100vh - 115px);
        }
    </style>
@endpush
<div class="">
    @livewire('teacher-table')
    @livewire('student-table')
</div>
