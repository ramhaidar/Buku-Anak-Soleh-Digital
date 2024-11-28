<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StudentActivityNotesController extends Controller
{
    public function index_table()
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        return view ( 'student.catatan-harian-siswa', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,

            'page' => 'Aktivitas Catatan Harian Siswa Table'
        ] );
    }

    public function index_detail( $noteId )
    {
        $activityNote = Note::find($noteId);

        $parentQuestion = $activityNote->parent_question;
        $teacherAnswer = $activityNote->teacher_answer;
        $teacherSign = "Belum";

        if (is_null($activityNote->parent_question)) {
            $parentQuestion = "Tidak Ada Pertanyaan";
        }

        if (is_null($activityNote->teacher_answer)) {
            $teacherAnswer = "Tidak Ada Jawaban dari Pertanyaan Orang Tua";
        }

        if($activityNote->teacher_sign) {
            $teacherSign = "Sudah";
        }

        return view ( 'student.catatan-harian-siswa-detail', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'activityNote' => $activityNote,
            'teacherAnswer' => $teacherAnswer,
            'parentQuestion' => $parentQuestion,
            'teacherSign' => $teacherSign,

            'page' => 'Detail Aktivitas Catatan Harian Siswa'
        ] );
    }

    public function index_add_notes()
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;
        $studentName = $student->user->name;

        $today = now()->toDateString();

        return view ( 'student.add-catatan-harian-siswa', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'today' => $today,

            'page' => 'Tambah Aktivitas Catatan Harian Siswa'
        ] );
    }

    public function fetchData_catatan_harian_by_id_siswa( Request $request )
    {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided

        $student = auth ()->user ()->student;
        $studentId = $student->id;

        // Base query to fetch prayer grades for the given student
        $query = Note::where('student_id', $studentId);

         // Apply search filter if available
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('agenda', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%");
            });
        }
        $query->orderByDesc('time_stamp');

        // Total records without filtering
        $totalData = Note::where('student_id', $studentId)->count();

        // Total records after filtering
        $totalFiltered = $query->count();

        // Get paginated results
        $activityNotes = $query->offset($start)->limit($length)->get();

        $data = $activityNotes->map(function ($activityNote) {
            return [
                'id' => $activityNote->id,
                'timeStamp' => $activityNote->time_stamp->toDateString(),
                'agenda' => $activityNote->agenda,
                'content' => $activityNote->content,
                'teacherAnswer' => !is_null($activityNote->teacher_answer),
                'teacherSign' => $activityNote->teacher_sign,
                'action' => view('student.partials.catatan-harian-siswa-action-button', ['noteId' => $activityNote->id])->render()
            ];
        });

        // Return JSON response
        return response ()->json ( [ 
            'draw'            => intval ( $request->input ( 'draw' ) ),
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $data
        ] );
    }

    public function store_activity_notes( Request $request )
    {
        $validatedData = $request->validate ( [ 
            'studentId'      => 'required|exists:students,id',
            'hari_tanggal' => 'required|date',
            'agenda' => 'required|string|max:255',
            'catatan_harian' => 'required|string',
            'pertanyaan_orang_tua' => 'nullable|string',
        ] );

        $existingnote = Note::where('student_id', $validatedData['studentId'])
            ->whereDate('time_stamp', $validatedData['hari_tanggal'])
            ->first();

        if ($existingnote) {
            return redirect ()->back ()->with ( 'error', 'Data dengan Tanggal Tersebut sudah Dibuat.' );
        }

        
        Note::create ( [
            'student_id' => $validatedData[ 'studentId' ],
            'time_stamp' => $validatedData[ 'hari_tanggal' ],
            'agenda'  => $validatedData[ 'agenda' ],
            'content'  => $validatedData[ 'catatan_harian' ],
            'parent_question' => $validatedData[ 'pertanyaan_orang_tua' ],
            'teacher_answer' => null,
            'teacher_sign' => false,
        ] );

        return redirect()->route('student.catatan-harian-siswa-table.index')
            ->with('success', 'Sukses Menambahkan Data Aktivitas Baru.');
    }

    public function delete_activity_notes( Request $request, $noteId )
    {
        $activityNote = Note::findOrFail ( $noteId );

        $activityNote->delete ();

        return response ()->json ( [ 'success' => 'Data Siswa Berhasil Dihapus.' ] );
    }
}
