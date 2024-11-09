<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition ()
    {
        return [ 
            'user_id'     => User::factory (), // relasi dengan factory User
            'teacher_id'  => Teacher::factory (), // relasi dengan factory Teacher jika perlu
            'nisn'        => $this->faker->unique ()->numerify ( '###########' ),
            'class_name'  => $this->faker->randomElement ( [ '5-Dzaid', '6-Ali', '4-Umar' ] ),
            'parent_name' => $this->faker->name ( 'female' ),
            'parent_code' => Str::random ( 10 ),
        ];
    }

    public function customData ( array $data ) : static
    {
        return $this->state ( function (array $attributes) use ($data)
        {
            return [ 
                'user_id'     => $data[ 'user_id' ] ?? $attributes[ 'user_id' ],
                'teacher_id'  => $data[ 'teacher_id' ] ?? $attributes[ 'teacher_id' ],
                'nisn'        => $data[ 'nisn' ] ?? $attributes[ 'nisn' ],
                'class_name'  => $data[ 'class_name' ] ?? $attributes[ 'class_name' ],
                'parent_name' => $data[ 'parent_name' ] ?? $attributes[ 'parent_name' ],
                'parent_code' => $data[ 'parent_code' ] ?? $attributes[ 'parent_code' ],
            ];
        } );
    }
}
