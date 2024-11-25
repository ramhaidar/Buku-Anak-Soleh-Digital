<?php

namespace App\Http\Controllers;

use App\Models\ViolationReport;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class StudentViolationReportController extends Controller
{
    public function index_table()
    {
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        $student = Student::find($studentId);
        $studentName = $student ? $student->user->name : 'N/A';

        return view ( 'student.laporan-pelanggaran-siswa', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            
            'page' => 'Laporan Pelanggaran Siswa'
        ] );
    }

    public function index_detail( $reportId )
    {
        $violationReport = ViolationReport::find($reportId);

        $teacherSign = "Belum";

        if($violationReport->teacher_sign) {
            $teacherSign = "Sudah";
        }

        return view ( 'student.laporan-pelanggaran-siswa-detail', [
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'violationReport' => $violationReport,
            'teacherSign' => $teacherSign,

            'page' => 'Detail Laporan Pelanggaran Siswa'
        ] );
    }

    public function fetchData_laporan_pelanggaran_by_id_siswa( Request $request )
    {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided
        
        $student = auth ()->user ()->student;
        $studentId = $student->id;

        // Base query to fetch prayer grades for the given student
        $query = ViolationReport::where('student_id', $studentId);

        // Apply search filter if available
        if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('violation_details', 'like', "%{$search}%")
            ->where('consequence', 'like', "%{$search}%");
        });
    }

        // Total records without filtering
        $totalData = ViolationReport::where('student_id', $studentId)->count();

        // Total records after filtering
        $totalFiltered = $query->count();

        // Get paginated results
        $violationReports = $query->offset($start)->limit($length)->get();

        $data = $violationReports->map(function ($violationReport) {

            return [
                'id' => $violationReport->id,
                'timeStamp' => $violationReport->time_stamp,
                'violationDetails' => $violationReport->violation_details,
                'consequence' => $violationReport->consequence,
                'teacherSign'    => $violationReport->teacher_sign,
                'action' => view('student.partials.laporan-pelanggaran-action-button', ['reportId' => $violationReport->id])->render()
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
