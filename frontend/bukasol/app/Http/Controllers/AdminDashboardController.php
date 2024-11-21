<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index ()
    {
        return redirect ()->route ( 'admin.student-table.index' );
    }

    public function student_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'admin.student-table', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Student Table"
        ] );
    }

    public function teacher_table_index ()
    {
        $auth = auth ()->user ();

        return view ( 'admin.teacher-table', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Teacher Table"
        ] );
    }

    public function student_add_index ()
    {
        $auth     = auth ()->user ();
        $teachers = Teacher::with ( 'user' )->get ()->all ();

        return view ( 'admin.add-student', [ 
            'role'     => $auth->role,
            'name'     => $auth->name,
            'teachers' => $teachers,

            'page'     => "Add Student"
        ] );
    }

    public function teacher_add_index ()
    {
        $auth = auth ()->user ();

        return view ( 'admin.add-teacher', [ 
            'role' => $auth->role,
            'name' => $auth->name,

            'page' => "Add Teacher"
        ] );
    }

    public function student_detail_index ( $id )
    {
        $auth    = auth ()->user ();
        $student = Student::with ( 'user', 'teacher.user' )->find ( $id );

        return view ( 'admin.student-detail', [ 
            'role'    => $auth->role,
            'name'    => $auth->name,
            'student' => $student,

            'page'    => "Detail Student"
        ] );
    }

    public function teacher_detail_index ( $id )
    {
        $auth    = auth ()->user ();
        $teacher = Teacher::with ( 'user' )->find ( $id );

        return view ( 'admin.teacher-detail', [ 
            'role'    => $auth->role,
            'name'    => $auth->name,
            'teacher' => $teacher,

            'page'    => "Detail Teacher"
        ] );
    }

    public function fetchData_student ()
    {
        // Safely get the length and start, with default values if they're not set
        $length = request ( 'length' ) ?? 10; // Number of records per page
        $start  = request ( 'start' ) ?? 0; // Offset for pagination
        $search = request ( 'search' )[ 'value' ] ?? ''; // Search term, if provided

        $query = Student::query ();

        // Apply search filter if available
        if ( ! empty ( $search ) )
        {
            $query->where ( 'nisn', 'like', "%{$search}%" )
                ->orWhere ( 'class_name', 'like', "%{$search}%" )
                ->orWhereHas ( 'user', function ($q) use ($search)
                {
                    $q->where ( 'name', 'like', "%{$search}%" );
                } );
        }

        // Total records without filtering
        $totalData = Student::count ();
        // Total records after filtering
        $totalFiltered = $query->count ();

        // Get paginated results
        $students = $query->offset ( $start )->limit ( $length )->get ();

        // Map data for DataTables response
        $data = $students->map ( function ($student)
        {
            return [ 
                'nisn'       => $student->nisn,
                'name'       => $student->user->name ?? 'N/A',
                'class_name' => $student->class_name,
                'action'     => view ( 'admin.partials.student-table-actions', [ 'student' => $student ] )->render (),
            ];
        } );

        // Return JSON response
        return response ()->json ( [ 
            'draw'            => intval ( request ( 'draw' ) ), // Draw counter for DataTables
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $data,
        ] );
    }

    public function fetchData_teacher ()
    {
        // Safely get the length and start, with default values if they're not set
        $length = request ( 'length' ) ?? 10; // Number of records per page
        $start  = request ( 'start' ) ?? 0; // Offset for pagination
        $search = request ( 'search' )[ 'value' ] ?? ''; // Search term, if provided

        $query = Teacher::query ();

        // Apply search filter if available
        if ( ! empty ( $search ) )
        {
            $query->where ( 'nip', 'like', "%{$search}%" )
                ->orWhere ( 'class_name', 'like', "%{$search}%" )
                ->orWhereHas ( 'user', function ($q) use ($search)
                {
                    $q->where ( 'name', 'like', "%{$search}%" );
                } );
        }

        // Total records without filtering
        $totalData = Teacher::count ();
        // Total records after filtering
        $totalFiltered = $query->count ();

        // Get paginated results
        $teachers = $query->offset ( $start )->limit ( $length )->get ();

        // Map data for DataTables response
        $data = $teachers->map ( function ($teacher)
        {
            return [ 
                'nip'        => $teacher->nip,
                'name'       => $teacher->user->name ?? 'N/A',
                'class_name' => $teacher->class_name,
                'action'     => view ( 'admin.partials.teacher-table-actions', [ 'teacher' => $teacher ] )->render (),
                // 'action'     => "<div class='row'><div class='col-sm col-auto'><a class='btn btn-link' href='#'>Detail</a></div><div class='col-sm col-auto'><a class='btn btn-link' href='#'>Delete</a></div></div>",
            ];
        } );

        // Return JSON response
        return response ()->json ( [ 
            'draw'            => intval ( request ( 'draw' ) ), // Draw counter for DataTables
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $data,
        ] );
    }
}
