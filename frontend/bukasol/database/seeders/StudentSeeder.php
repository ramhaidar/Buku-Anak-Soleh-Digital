<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run ()
    {
        // Ambil class_name dari 3 data Teacher pertama
        $teachers = Teacher::limit ( 3 )->get ();

        $predefinedStudents = [ 
            [ 
                'user_data'    => [ 
                    'name'     => 'Murid Bagus 1',
                    'username' => 'murid1',
                    'password' => Hash::make ( 'murid123' ),
                    'role'     => 'Student',
                ],
                'student_data' => [ 
                    'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                    'class_name'  => $teachers[ 0 ]->class_name ?? null,
                    'parent_name' => 'Ibu Murid 1',
                    'parent_code' => Str::random ( 10 ),
                ],
            ],
            [ 
                'user_data'    => [ 
                    'name'     => 'Murid Bagus 2',
                    'username' => 'murid2',
                    'password' => Hash::make ( 'murid123' ),
                    'role'     => 'Student',
                ],
                'student_data' => [ 
                    'nisn'        => fake ()->unique ()->numerify ( '###########' ),
                    'class_name'  => $teachers[ 1 ]->class_name ?? null,
                    'parent_name' => 'Ibu Murid 2',
                    'parent_code' => Str::random ( 10 ),
                ],
            ],
            [ 
                'user_data'    => [ 
                    'name'     => 'Murid Bagus 3',
                    'username' => 'murid3',
                    'password' => Hash::make ( 'murid123' ),
                    'role'     => 'Student',
                ],
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
            $user = User::factory ()->customData ( $studentData[ 'user_data' ] )->create ();

            // Create associated student record with a random teacher ID
            Student::factory ()->customData ( array_merge ( $studentData[ 'student_data' ], [ 
                'user_id'    => $user->id,
                'teacher_id' => $teachers->random ()->id,
            ] ) )->create ();
        }

        // Generate random students
        for ( $i = 0; $i < 300; $i++ )
        {
            // Create a user for each student
            $user = User::factory ()->customData ( [ 
                'role' => 'Student'
            ] )->create ();

            // Assign a random teacher's class_name and teacher_id to the student
            $randomTeacher = Teacher::inRandomOrder ()->first ();

            // Create associated student record with a random teacher
            Student::factory ()->customData ( [ 
                'user_id'    => $user->id,
                'class_name' => $randomTeacher->class_name,
                'teacher_id' => $randomTeacher->id,
            ] )->create ();
        }
    }
}
