<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\TeacherSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run () : void
    {
        $this->call ( [ 
            UserSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
        ] );
    }
}
