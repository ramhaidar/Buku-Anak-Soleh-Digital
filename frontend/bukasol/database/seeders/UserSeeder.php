<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run ()
    {
        User::factory ()->customData ( [ 
            'name'     => 'Admin',
            'username' => 'admin1',
            'password' => 'admin123',
            'role'     => 'Admin',
        ] )->create ();

        User::factory ()->customData ( [ 
            'name'     => 'Admin',
            'username' => 'admin2',
            'password' => 'admin123',
            'role'     => 'Admin',
        ] )->create ();

        User::factory ()->customData ( [ 
            'name'     => 'Admin',
            'username' => 'admin3',
            'password' => 'admin123',
            'role'     => 'Admin',
        ] )->create ();
    }
}
