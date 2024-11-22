<?php

namespace App\Http\Controllers;

use App\Models\PrayerGrade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GradeController extends Controller
{
    public function index_teacher ()
    {
        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        return view ( 'teacher.nilai-uji-gerakan-siswa', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'className' => $className,
            'page' => 'Nilai Uji Gerakan Siswa Table'
        ] );
    }

    public function index_student ( $studentId )
    {
        $student = Student::find($studentId);
        $studentName = $student ? $student->user->name : 'N/A';

        return view ( 'teacher.nilai-uji-gerakan-siswa-detail', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'page' => 'Detail Nilai Uji Gerakan Siswa'
        ] );
    }

    public function index_add_grade ( $studentId )
    {
        $student = Student::find($studentId);
        $studentName = $student ? $student->user->name : 'N/A';

        return view ( 'teacher.add-nilai-uji-gerakan-siswa', [ 
            'role' => auth ()->user ()->role,
            'name' => auth ()->user ()->name,
            'studentId' => $studentId,
            'studentName' => $studentName,
            'page' => 'Tambah Nilai Uji Gerakan Siswa'
        ] );
    }

    public function fetchData_nilai_uji_gerakan_by_nama_kelas ( Request $request )
    {
        // Safely get the length and start, with default values if they're not set
        $length = $request->input ( 'length', 10 ); // Number of records per page
        $start  = $request->input ( 'start', 0 ); // Offset for pagination
        $search = $request->input ( 'search.value', '' ); // Search term, if provided

        $teacher   = auth ()->user ()->teacher;
        $className = $teacher->class_name;

        $query = Student::where ( 'class_name', $className )->with ( 'user', 'prayerGrades' );

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
            $prayerGrades = $student->prayerGrades;

            $avgSemester1 = $prayerGrades->avg ( 'grade_semester1' ) ?? 0.0;
            $avgSemester2 = $prayerGrades->avg ( 'grade_semester2' ) ?? 0.0;

            $parentSignFalseCount  = $prayerGrades->where ( 'parent_sign', false )->count ();
            $teacherSignFalseCount = $prayerGrades->where ( 'teacher_sign', false )->count ();

            return [ 
                'studentNisn'  => $student->nisn,
                'studentName'  => $student->user->name,
                'avgSemester1' => number_format ( $avgSemester1, 2 ),
                'avgSemester2' => number_format ( $avgSemester2, 2 ),
                'parentSign'   => $parentSignFalseCount === 0,
                'teacherSign'  => $teacherSignFalseCount === 0,
                'action' => view('teacher.partials.nilai-uji-gerakan-siswa-action-button', ['studentId' => $student->id])->render() 
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

    public function fetchData_nilai_uji_gerakan_by_id_siswa ( Request $request ) {
        // Safely get the length and start for pagination
        $length = $request->input('length', 10); // Number of records per page
        $start = $request->input('start', 0); // Offset for pagination
        $search = $request->input('search.value', ''); // Search term, if provided
        $studentId = $request->route('id');

        // Base query to fetch prayer grades for the given student
        $query = PrayerGrade::where('student_id', $studentId);

         // Apply search filter if available
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('motion_category', 'like', "%{$search}%");
            });
        }

        // Total records without filtering
        $totalData = PrayerGrade::where('student_id', $studentId)->count();

        // Total records after filtering
        $totalFiltered = $query->count();

        // Get paginated results
        $prayerGrades = $query->offset($start)->limit($length)->get();

        $data = $prayerGrades->map(function ($prayerGrade) {
            return [
                'timeStamp'      => $prayerGrade->time_stamp,
                'motionCategory' => $prayerGrade->motion_category,
                'gradeSemester1' => number_format($prayerGrade->grade_semester1, 2),
                'gradeSemester2' => number_format($prayerGrade->grade_semester2, 2),
                'teacherSign'    => $prayerGrade->teacher_sign,
                'parentSign'     => $prayerGrade->parent_sign,
                'action' => view('teacher.partials.nilai-uji-gerakan-siswa-detail-action-button', ['gradeId' => $prayerGrade->id])->render() 
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

    public function store_prayer_grade( Request $request ) {
        $validatedData = $request->validate ( [ 
            'studentId'      => 'required|exists:students,id',
            'jenis_gerakan' => 'required|string|max:255',
            'nilai_semester_1' => 'required|numeric|min:0|max:100',
            'nilai_semester_2' => 'required|numeric|min:0|max:100',
        ] );

        PrayerGrade::create ( [ 
            'student_id'       => $validatedData[ 'studentId' ],
            'time_stamp'       => now (),
            'motion_category'  => $validatedData[ 'jenis_gerakan' ],
            'grade_semester1'  => $validatedData[ 'nilai_semester_1' ],
            'grade_semester2'  => $validatedData[ 'nilai_semester_2' ],
            'teacher_sign'     => false,
            'teacher_sign'     => false,
        ] );

        return redirect()->route('teacher.nilai-uji-gerakan-siswa-detail.index', ['id' => $validatedData['studentId']])
            ->with('success', 'Sukses Menambahkan Data Nilai Baru.');
    }

    public function updatePrayerGrade ( Request $request, $studentId )
    {
        $validator = Validator::make ( $request->all (), [ 
            'motion_category' => 'required|string|max:255',
            'grade_semester1' => 'required|numeric|min:0|max:100',
            'grade_semester2' => 'required|numeric|min:0|max:100',
        ] );

        if ( $validator->fails () )
        {
            return response ()->json ( [ 'errors' => $validator->errors () ], 422 );
        }

        $validatedData = $validator->validated ();

        // Find the PrayerGrade by ID
        $prayerGrade = PrayerGrade::findOrFail ( $id );

        // Check for existing PrayerGrade with the same student and motion category
        $existingGrade = PrayerGrade::where ( 'student_id', $prayerGrade->student_id )
            ->where ( 'motion_category', $validatedData[ 'motion_category' ] )
            ->where ( 'id', '!=', $studentId )
            ->first ();

        if ( $existingGrade )
        {
            return response ()->json ( [ 
                'message' => 'Prayer grade for this motion category already exists for the student.'
            ], 409 ); // 409 Conflict
        }

        // Update the PrayerGrade
        $prayerGrade->motion_category = $validatedData[ 'motion_category' ];
        $prayerGrade->grade_semester1 = $validatedData[ 'grade_semester1' ];
        $prayerGrade->grade_semester2 = $validatedData[ 'grade_semester2' ];
        $prayerGrade->save ();

        $response = [ 
            'id'              => $prayerGrade->id,
            'student_id'      => $prayerGrade->student_id,
            'motion_category' => $prayerGrade->motion_category,
            'grade_semester1' => $prayerGrade->grade_semester1,
            'grade_semester2' => $prayerGrade->grade_semester2
        ];

        return response ()->json ( $response, 200 );
    }

    public function deletePrayerGrade ( $gradeId )
    {

        $prayerGrade = PrayerGrade::findOrFail ( $gradeId );

        $motionCategory = $prayerGrade->motion_category;
        $studentName    = $prayerGrade->student->user->name;

        $prayerGrade->delete ();

        // Prepare response message
        $message = "Prayer Grade '{$motionCategory}' of Student '{$studentName}' Successfully Deleted";

        return response ()->json ( [ 'message' => $message ], 200 );
    }

    public function teacherSignPrayerGrade ( $gradeId )
    {

        $prayerGrade = PrayerGrade::findOrFail ( $gradeId );

        $prayerGrade->teacher_sign = ! $prayerGrade->teacher_sign;

        $prayerGrade->save ();

        $response = [ 
            'id'              => $prayerGrade->id,
            'student_id'      => $prayerGrade->student_id,
            'time_stamp'      => $prayerGrade->time_stamp,
            'motion_category' => $prayerGrade->motion_category,
            'grade_semester1' => $prayerGrade->grade_semester1,
            'grade_semester2' => $prayerGrade->grade_semester2,
            'teacher_sign'    => $prayerGrade->teacher_sign,
            'parent_sign'     => $prayerGrade->parent_sign
        ];

        return response ()->json ( $response, 200 );
    }

    public function parentSignPrayerGrade ( $gradeId, Request $request )
    {

        $request->validate ( [ 
            'parent_code' => 'required|string',
        ] );

        $prayerGrade = PrayerGrade::findOrFail ( $gradeId );

        $student = $prayerGrade->student;

        if ( $student->parent_code === $request->input ( 'parent_code' ) )
        {
            // Toggle the parent_sign field
            $prayerGrade->parent_sign = ! $prayerGrade->parent_sign;

            // Save the updated PrayerGrade
            $prayerGrade->save ();

            $response = [ 
                'id'              => $prayerGrade->id,
                'student_id'      => $prayerGrade->student_id,
                'time_stamp'      => $prayerGrade->time_stamp,
                'motion_category' => $prayerGrade->motion_category,
                'grade_semester1' => $prayerGrade->grade_semester1,
                'grade_semester2' => $prayerGrade->grade_semester2,
                'teacher_sign'    => $prayerGrade->teacher_sign,
                'parent_sign'     => $prayerGrade->parent_sign,
            ];

            return response ()->json ( $response, 200 );
        }
        else
        {
            return response ()->json ( [ 
                'message' => 'Wrong Parent Code'
            ], 403 );
        }
    }

    public function getGradeReportPdf ( $gradeId )
    {

    }
}
