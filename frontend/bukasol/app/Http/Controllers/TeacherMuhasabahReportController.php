<?php

namespace App\Http\Controllers;

use App\Models\MuhasabahReport;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TeacherMuhasabahReportController extends Controller
{
    public function index_teacher()
    {
        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        return view ( 'teacher.laporan-muhasabah-harian', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'className' => $className,

            'page' => 'Laporan Muhasabah Table'
        ] );
    }

    public function index_student( $studentId )
    {
        $student = Student::find($studentId);
        $studentName = $student ? $student->user->name : 'N/A';

        return view ( 'teacher.laporan-muhasabah-harian-siswa', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            
            'page' => 'Laporan Muhasabah Siswa'
        ] );
    }

    public function index_detail( $reportId )
    {
        $muhasabahReport = MuhasabahReport::find($reportId);

        $surahName = "-";
        $surahAyat = "-";

        if ( !is_null($muhasabahReport->surah_name)) {
            $surahName = $muhasabahReport->surah_name;
        }

        if ( !is_null($muhasabahReport->surah_ayat)) {
            $surahAyat = $muhasabahReport->surah_ayat;
        }

        return view ( 'teacher.laporan-muhasabah-harian-siswa-detail', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'muhasabahReport' => $muhasabahReport,
            'surahName' => $surahName,
            'surahAyat' => $surahAyat,

            'page' => 'Detail Detail Laporan Muhasabah Siswa'
        ] );
    }

    public function fetchData_laporan_muhasabah_by_nama_kelas( Request $request )
    {
        // Safely get the length and start, with default values if they're not set
        $length = $request->input ( 'length', 10 ); // Number of records per page
        $start  = $request->input ( 'start', 0 ); // Offset for pagination
        $search = $request->input ( 'search.value', '' ); // Search term, if provided

        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        $query = Student::where ( 'class_name', $className )->with ( 'user', 'muhasabahReports' );

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
        $data = $students->map ( function ($student)
        {
            $muhasabahReports = $student->muhasabahReports;

            $parentSignFalseCount  = $muhasabahReports->where ( 'parent_sign', false )->count ();
            $teacherSignFalseCount = $muhasabahReports->where ( 'teacher_sign', false )->count ();

            return [
                'studentNisn'  => $student->nisn,
                'studentName'  => $student->user->name,
                'teacherSign'  => $teacherSignFalseCount === 0,
                'parentSign'  => $parentSignFalseCount === 0,
                'action' => view('teacher.partials.laporan-muhasabah-siswa-action-button', ['studentId' => $student->id])->render()
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

    public function fetchData_laporan_muhasabah_by_id_siswa( Request $request )
    {
         // Safely get the length and start for pagination
         $length = $request->input('length', 10); // Number of records per page
         $start = $request->input('start', 0); // Offset for pagination
         $search = $request->input('search.value', ''); // Search term, if provided
         $studentId = $request->route('id');
 
         // Base query to fetch prayer grades for the given student
         $query = MuhasabahReport::where('student_id', $studentId);
 
         // Apply search filter if available
         if (!empty($search)) {
             $query->where(function ($q) use ($search) {
             });
         }
 
         // Total records without filtering
         $totalData = MuhasabahReport::where('student_id', $studentId)->count();
 
         // Total records after filtering
         $totalFiltered = $query->count();
 
         // Get paginated results
         $muhasabahReports = $query->offset($start)->limit($length)->get();

         $data = $muhasabahReports->map(function ($muhasabahReport) {
            $mengaji = false;

            if ( !is_null($muhasabahReport->surah_name) && !is_null($muhasabahReport->surah_ayat)) {
                $mengaji = true;
            }

            $countFardhuPray = 0;

            if ($muhasabahReport->subuh_pray) {
                $countFardhuPray++;
            }

            if ($muhasabahReport->dzuhur_pray) {
                $countFardhuPray++;
            }

            if ($muhasabahReport->ashar_pray) {
                $countFardhuPray++;
            }

            if ($muhasabahReport->maghrib_pray) {
                $countFardhuPray++;
            }

            if ($muhasabahReport->isya_pray) {
                $countFardhuPray++;
            }

            $fardhuPray = $countFardhuPray . "/5";

            return [
                'id' => $muhasabahReport->id,
                'timeStamp' => $muhasabahReport->time_stamp,
                'mengaji' => $mengaji,
                'sholatSunnah' => $muhasabahReport->sunnah_pray,
                'sholatFardhu' => $fardhuPray,
                'teacherSign' => $muhasabahReport->teacher_sign,
                'parentSign' => $muhasabahReport->parent_sign,
                'action' => view('teacher.partials.laporan-muhasabah-siswa-detail-action-button', ['reportId' => $muhasabahReport->id])->render()

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

    public function teacher_sign_muhasabah_report( Request $request, $reportId )
    {
        $muhasabahReport = MuhasabahReport::findOrFail ( $reportId );

        $muhasabahReport->teacher_sign = ! $muhasabahReport->teacher_sign;

        $muhasabahReport->save ();

        if ( $muhasabahReport->teacher_sign ) {
            return response ()->json ( [ 'success' => 'Data Sudah Ditandatangani.' ] );
        }

        return response ()->json ( [ 'success' => 'Data Tidak Jadi Ditandatangani.' ] );
    }

    public function muhasabah_report_pdf()
    {
        
    }
}
