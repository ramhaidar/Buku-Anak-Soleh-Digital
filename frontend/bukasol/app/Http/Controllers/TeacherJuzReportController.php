<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TeacherJuzReportController extends Controller
{
    public function index_teacher_juz( $juzNumber )
    {
        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        return view ( 'teacher.laporan-bacaan-juz', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'className' => $className,
            'juzNumber' => $juzNumber,

            'page' => 'Laporan Juz Table'
        ] );
    }

    public function index_student_juz( $juzNumber, $studentId )
    {
        $student = Student::find($studentId);
        $studentName = $student->user->name;

        return view ( 'teacher.laporan-bacaan-juz-detail', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'juzNumber' => $juzNumber,
            
            'page' => 'Laporan Juz Siswa'
        ] );
    }

    public function index_add_report( $juzNumber, $studentId )
    {
        $studentFind = Student::find($studentId);
        $studentName = $studentFind->user->name;

        $today = now()->toDateString();

        return view ( 'teacher.add-laporan-bacaan-juz', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'juzNumber' => $juzNumber,
            'today' => $today,

            'page' => 'Tambah Laporan Bacaan Juz Siswa'
        ] );
    }

    public function fetchData_laporan_juz_by_nama_kelas( Request $request )
    {
        // Safely get the length and start, with default values if they're not set
        $length = $request->input ( 'length', 10 ); // Number of records per page
        $start  = $request->input ( 'start', 0 ); // Offset for pagination
        $search = $request->input ( 'search.value', '' ); // Search term, if provided
        $juzNumber = $request->route('juzNumber');

        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        $query = Student::where('class_name', $className)
            ->with('user', 'juz')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select('students.*', 'users.name as user_name')
            ->orderBy('user_name');

        // Apply search filter if available
        if ( ! empty ( $search ) )
        {
            $query->where ( function ($q) use ($search)
            {
                $q->where ( 'nisn', 'like', "%{$search}%" )
                    ->orWhereHas ( 'user', function ($subQuery) use ($search)
                    {
                        $subQuery->where ( 'name', 'like', "%{$search}%" );
                    } );
            } );
        }

        // Total records without filtering
        $totalData = Student::where ( 'class_name', $className )->count ();

        // Total records after filtering
        $totalFiltered = $query->count ();

        // Get paginated results
        $students = $query->offset ( $start )->limit ( $length )->get ();

        // Map data for DataTables response
        $data = $students->map ( function ($student) use ($juzNumber)
        {
            $juzReports = $student->juz->where ( 'juz_number', $juzNumber );

            $latestJuzReport = $juzReports->sortByDesc('time_stamp')->first();

            $surahName = "-";
            $surahAyat = "-";

            if ( !is_null($latestJuzReport) ) {
                $surahName = $latestJuzReport->surah_name;
                $surahAyat = $latestJuzReport->surah_ayat;
            }

            $teacherSignFalseCount = $juzReports->where ( 'teacher_sign', false )->count ();

            return [
                'studentNisn'  => $student->nisn,
                'studentName'  => $student->user->name,
                'surahName' => $surahName,
                'surahAyat' => $surahAyat,
                'teacherSign'  => $teacherSignFalseCount === 0,
                'action' => view('teacher.partials.laporan-juz-action-button', [ 'juzNumber' => $juzNumber, 'studentId' => $student->id])->render()
            ];
        } );

        // Return JSON response
        return response ()->json ( [
            'draw'            => intval ( $request->input ( 'draw' ) ),
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $data
        ] );
    }

    public function fetchData_laporan_juz_by_id_siswa( Request $request )
    {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided
        
        $studentId = $request->route('id');
        $juzNumber = $request->route('juzNumber');

        // Base query to fetch prayer grades for the given student
        $query = Juz::where('student_id', $studentId)
                    ->where('juz_number', $juzNumber)
                    ->orderByDesc('time_stamp');

         // Apply search filter if available
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('surah_name', 'like', "%{$search}%")
                ->where('surah_ayat', 'like', "%{$search}%");
            });
        }

        // Total records without filtering
        $totalData = Juz::where('student_id', $studentId)
                        ->where('juz_number', $juzNumber)
                        ->count();

        // Total records after filtering
        $totalFiltered = $query->count();

        // Get paginated results
        $juzReports = $query->offset($start)->limit($length)->get();

        $data = $juzReports->map(function ($juzReport) {
            return [
                'id' => $juzReport->id,
                'timeStamp' => $juzReport->time_stamp->toDateString(),
                'surahName' => $juzReport->surah_name,
                'surahAyat' => $juzReport->surah_ayat,
                'teacherSign' => $juzReport->teacher_sign,
                'action' => view('teacher.partials.laporan-juz-detail-action-button', [ 'reportId' => $juzReport->id ])->render()
            ];
        });

        // Return JSON response for DataTables
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }

    public function store_juz_report( Request $request )
    {
        $validatedData = $request->validate([
            'studentId' => 'required|exists:students,id',
            'juz' => 'required|integer',
            'tanggal' => 'required|date',
            'surah' => 'required|string|max:255',
            'ayat' => 'required|string|max:255',
        ]);

        $existingReport = Juz::where('student_id', $validatedData['studentId'])
            ->whereDate('time_stamp', $validatedData['tanggal'])
            ->where('juz_number', $validatedData['juz'])
            ->where('surah_name', $validatedData['tanggal'])
            ->where('surah_ayat', $validatedData['tanggal'])
            ->first();

        if ($existingReport) {
            return redirect ()->back ()->with ( 'error', 'Data Tersebut sudah Dibuat.' );
        }

        Juz::create ( [
            'student_id' => $validatedData[ 'studentId' ],
            'time_stamp' => $validatedData[ 'tanggal' ],
            'juz_number' => $validatedData[ 'juz' ],
            'surah_name' => $validatedData[ 'surah' ],
            'surah_ayat' => $validatedData[ 'ayat' ],
            'teacher_sign' => false,
        ] );

        return redirect()->route('teacher.laporan-bacaan-juz-siswa.index' ,[ 'juzNumber' => $validatedData[ 'juz' ], 'id' => $validatedData[ 'studentId' ] ])
            ->with('success', 'Sukses Menambahkan Data Laporan Baru.');
    }
    
    public function delete_juz_report( Request $request, $reportId )
    {
        $juzReport = Juz::findOrFail ( $reportId );

        $juzReport->delete ();

        return response ()->json ( [ 'success' => 'Data Siswa Berhasil Dihapus.' ] );
    }

    public function teacher_sign_juz_report( Request $request, $reportId )
    {
        $juzReport = Juz::findOrFail ( $reportId );

        $juzReport->teacher_sign = ! $juzReport->teacher_sign;

        $juzReport->save ();

        if ( $juzReport->teacher_sign ) {
            return response ()->json ( [ 'success' => 'Data Sudah Ditandatangani.' ] );
        }

        return response ()->json ( [ 'success' => 'Data Tidak Jadi Ditandatangani.' ] );
    }

    public function juz_report_pdf( $juzNumber, $studentId )
    {
        $juzReports = Juz::where('student_id', $studentId)
                        ->where('juz_number', $juzNumber)->get();

        $student = Student::find($studentId);

        $data = [
            'juzReports' => $juzReports,
            'juzNumber' => $juzNumber,
            'student' => $student,
        ];

        $pdf = Pdf::loadView('convert.juz-report-template', $data);
        $fileName = "Lembar Laporan Juz ".$juzNumber."_".$student->class_name."_".$student->user->name.".pdf";

        return Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
