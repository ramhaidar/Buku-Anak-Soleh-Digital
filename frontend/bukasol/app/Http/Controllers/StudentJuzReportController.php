<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StudentJuzReportController extends Controller
{
    public function index_table( $juzNumber )
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        return view ( 'student.laporan-bacaan-juz', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'juzNumber' => $juzNumber,

            'page' => 'Laporan Juz Siswa Table'
        ] );
    }

    public function fetchData_laporan_juz_by_id_siswa( Request $request )
    {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided
        
        $student = auth ()->user ()->student;
        $studentId = $student->id;

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
                'teacherSign' => $juzReport->teacher_sign
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
}
