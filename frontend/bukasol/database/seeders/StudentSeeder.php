<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run ()
    {
        // Retrieve the first 3 teachers
        $teachers = Teacher::limit ( 3 )->get ();

        // Insert predefined students
        $predefinedStudents = [ 
            [ 
                'name'         => 'Murid Bagus 1',
                'username'     => 'murid1',
                'password'     => 'murid123',
                'role'         => 'Student',
                'student_data' => [ 
                    'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                    'class_name'  => $teachers[ 0 ]->class_name ?? null,
                    'parent_name' => 'Ibu Murid 1',
                    'parent_code' => Str::random ( 10 ),
                ],
            ],
            [ 
                'name'         => 'Murid Bagus 2',
                'username'     => 'murid2',
                'password'     => 'murid123',
                'role'         => 'Student',
                'student_data' => [ 
                    'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                    'class_name'  => $teachers[ 1 ]->class_name ?? null,
                    'parent_name' => 'Ibu Murid 2',
                    'parent_code' => Str::random ( 10 ),
                ],
            ],
            [ 
                'name'         => 'Murid Bagus 3',
                'username'     => 'murid3',
                'password'     => 'murid123',
                'role'         => 'Student',
                'student_data' => [ 
                    'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                    'class_name'  => $teachers[ 2 ]->class_name ?? null,
                    'parent_name' => 'Ibu Murid 3',
                    'parent_code' => Str::random ( 10 ),
                ],
            ],
        ];

        foreach ( $predefinedStudents as $studentData )
        {
            // Create user record for student
            $user = User::factory ()->customData ( [ 
                'name'     => $studentData[ 'name' ],
                'username' => $studentData[ 'username' ],
                'password' => $studentData[ 'password' ],
                'role'     => $studentData[ 'role' ],
            ] )->create ();

            // Create associated student record
            Student::factory ()->customData ( array_merge ( $studentData[ 'student_data' ], [ 
                'user_id'    => $user->id,
                'teacher_id' => $teachers->random ()->id,
            ] ) )->create ();
        }

        // Generate 300 random student records with the role set to "Student"
        for ( $i = 0; $i < 100; $i++ )
        {
            // Create a user with the role "Student"
            $user = User::factory ()->customData ( [ 
                'role' => 'Student',
            ] )->create ();

            // Assign a random teacher to the student
            $randomTeacher = Teacher::inRandomOrder ()->first ();

            // Create associated student record
            Student::factory ()->customData ( [ 
                'user_id'     => $user->id,
                'class_name'  => $randomTeacher->class_name,
                'teacher_id'  => $randomTeacher->id,
                'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                'parent_name' => fake ()->name (),
                'parent_code' => Str::random ( 10 ),
            ] )->create ();
        }
    }
}
