@extends('teacher.teacher-dashboard')

@push('styles')
    <link href="{{ asset('css/dashboardWithTable.css') }}" rel="stylesheet">

    <style>
        .form-check-input:checked {
            background-color: green !important;
        }

        .form-check-input:focus {
            border-color: green !important;
        }
    </style>
@endpush

@section('content_3')
    <div class="p-0 m-0">
        <div class="text-center p-0 m-0">
            <h2 class="text-center mb-4">Jawab Pertanyaan Orang Tua Siswa {{ $activityNote->student->user->name }}</h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="p-4 rounded w-75">
                <form action="{{ route('activity-notes-parent-answer.update', ['id' => $activityNote->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Pertanyaan Orang Tua -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block" for="pertanyaan_orang_tua">Pertanyaan Orang Tua</label>
                        <div class="bg-dark text-white p-3 rounded-3">{{ $activityNote->parent_question }}</div>
                    </div>

                    <!-- Jawaban Guru -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="jawaban_guru">Jawaban Guru</label>
                        <textarea class="form-control rounded-3 border-dark border-2" id="jawaban_guru" name="jawaban_guru" rows="3" placeholder="Jawaban Guru...">{{ $activityNote->teacher_answer }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center align-items-stretch pt-3 gap-3">
                        <a class="btn btn-secondary rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" href="{{ route('teacher.catatan-harian-siswa-detail.index', ['id' => $activityNote->id]) }}">Batal</a>
                        <button class="btn btn-success rounded-3 flex-fill d-flex justify-content-center align-items-center text-center px-3 py-2" type="submit">Jawab</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener("pageshow", function(event) {
            if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                // Reload the page when navigating forward or back in history
                location.reload();
            }
        });
    </script>
@endpush