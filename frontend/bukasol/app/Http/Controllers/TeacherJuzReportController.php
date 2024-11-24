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
        $studentName = $student ? $student->user->name : 'N/A';

        return view ( 'teacher.laporan-bacaan-juz-detail', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'juzNumber' => $juzNumber,
            
            'page' => 'Laporan Juz Siswa'
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

        $query = Student::where ( 'class_name', $className )->with ( 'user', 'juz' );

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

            $parentSignFalseCount = $juzReports->where ( 'parent_sign', false )->count ();

            return [
                'studentNisn'  => $student->nisn,
                'studentName'  => $student->user->name,
                'surahName' => $surahName,
                'surahAyat' => $surahAyat,
                'parentSign'  => $parentSignFalseCount === 0,
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
                    ->where('juz_number', $juzNumber);

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
                'timeStamp' => $juzReport->time_stamp,
                'surahName' => $juzReport->surah_name,
                'surahAyat' => $juzReport->surah_ayat,
                'parentSign' => $juzReport->parent_sign,
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

    public function juz_report_pdf()
    {
        
    }
}
