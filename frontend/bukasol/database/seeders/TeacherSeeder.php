<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run ()
    {
        // Insert predefined teachers
        $predefinedTeachers = [ 
            [ 
                'name'     => 'Guru Bagus 1',
                'username' => 'guru1',
                'password' => 'guru123',
                'role'     => 'Teacher',
            ],
            [ 
                'name'     => 'Guru Bagus 2',
                'username' => 'guru2',
                'password' => 'guru123',
                'role'     => 'Teacher',
            ],
            [ 
                'name'     => 'Guru Bagus 3',
                'username' => 'guru3',
                'password' => 'guru123',
                'role'     => 'Teacher',
            ],
        ];

        foreach ( $predefinedTeachers as $teacherData )
        {
            // Create user record with the correct role
            $user = User::factory ()->customData ( [ 
                'name'     => $teacherData[ 'name' ],
                'username' => $teacherData[ 'username' ],
                'password' => $teacherData[ 'password' ],
                'role'     => $teacherData[ 'role' ],
            ] )->create ();

            // Create associated teacher record
            Teacher::factory ()->customData ( [ 'user_id' => $user->id ] )->create ();
        }

        // Generate 300 random teacher records with the role set to "Teacher"
        for ( $i = 0; $i < 300; $i++ )
        {
            // Create a user with the role "Teacher"
            $user = User::factory ()->customData ( [ 
                'role' => 'Teacher'
            ] )->create ();

            // Create associated teacher record
            Teacher::factory ()->customData ( [ 'user_id' => $user->id ] )->create ();
        }
    }
}
