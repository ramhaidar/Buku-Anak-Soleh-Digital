<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Store a newly created user and student in storage.
     */
    public function store ( Request $request )
    {
        $validatedData = $request->validate ( [ 
            // User data validation
            'name'        => 'required|string|max:255',
            'username'    => 'required|string|unique:users,username|max:50',
            // 'password'    => 'required|string|min:8|confirmed',
            // 'role'        => 'required|string|in:student',

            // Student data validation
            'nisn'        => 'required|string|unique:students,nisn|max:20',
            'class_name'  => 'required|string|max:50',
            'parent_name' => 'required|string|max:255',
            // 'parent_code' => 'required|string|max:50',
            'teacher_id'  => 'required|exists:teachers,id',
        ] );

        // Create the User first
        $user = User::create ( [ 
            'name'     => $validatedData[ 'name' ],
            'username' => $validatedData[ 'username' ],
            'password' => Hash::make ( 'password' ),
            'role'     => "Student",
        ] );

        // Then, create the Student using the User's ID
        Student::create ( [ 
            'user_id'     => $user->id,
            'nisn'        => $validatedData[ 'nisn' ],
            'class_name'  => $validatedData[ 'class_name' ],
            'parent_name' => $validatedData[ 'parent_name' ],
            'parent_code' => Str::random ( 10 ),
            'teacher_id'  => $validatedData[ 'teacher_id' ],
        ] );

        return redirect ()->back ()->with ( 'success', 'Sukses Menambahkan Data Siswa Baru.' );

        // return response ()->json ( [ 'error' => 'Gagal Menambahkan Data Siswa Baru.' ] );
    }

    /**
     * Display the specified student details.
     */
    public function show ( Student $student )
    {
        $student->load ( 'user', 'teacher.user', 'juz', 'muhasabahReports', 'notes', 'prayerGrades', 'prayerRecitationGrades', 'readActivities', 'violationReports' );
        return response ()->json ( $student );
    }

    /**
     * Update the specified student and user in storage.
     */
    public function update ( Request $request, Student $student )
    {
        $validatedData = $request->validate ( [ 
            // User data validation
            'name'        => 'required|string|max:255',
            'username'    => 'required|string|max:50|unique:users,username,' . $student->user->id,
            'password'    => 'nullable|string|min:8|confirmed',

            // Student data validation
            'nisn'        => 'required|string|max:20|unique:students,nisn,' . $student->id,
            'class_name'  => 'required|string|max:50',
            'parent_name' => 'required|string|max:255',
            'parent_code' => 'required|string|max:50',
        ] );

        // Update User data
        $student->user->update ( [ 
            'name'     => $validatedData[ 'name' ],
            'username' => $validatedData[ 'username' ],
            'password' => $validatedData[ 'password' ] ? Hash::make ( $validatedData[ 'password' ] ) : $student->user->password,
        ] );

        // Update Student data
        $student->update ( [ 
            'nisn'        => $validatedData[ 'nisn' ],
            'class_name'  => $validatedData[ 'class_name' ],
            'parent_name' => $validatedData[ 'parent_name' ],
            'parent_code' => $validatedData[ 'parent_code' ],
        ] );

        if ( $request->ajax () )
        {
            return response ()->json ( [ 'success' => 'Sukses Mengubah Data Siswa.' ] );
        }

        return response ()->json ( [ 'error' => 'Gagal Mengubah Data Siswa.' ] );
    }

    /**
     * Remove the specified student and associated user from storage.
     */
    public function destroy ( Request $request, Student $student )
    {
        // Delete the related user, if it exists
        if ( $student->user )
        {
            $student->user->delete ();
        }

        // Delete the student
        $student->delete ();

        // Refresh the student instance to check if it still exists in the database
        $studentExists = Student::where ( 'id', $student->id )->exists ();
        $userExists    = $student->user ? User::where ( 'id', $student->user->id )->exists () : false;

        // Check if both student and user no longer exist
        if ( ! $studentExists && ! $userExists )
        {
            return response ()->json ( [ 'success' => 'Data Siswa Berhasil Dihapus.' ] );
        }

        return response ()->json ( [ 'error' => 'Data Siswa Gagal Dihapus.' ] );
    }
}
