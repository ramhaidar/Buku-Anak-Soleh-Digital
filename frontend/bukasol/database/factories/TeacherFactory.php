<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition ()
    {
        // Daftar nama sahabat nabi
        $sahabatNames = [ 'AbuBakr', 'Umar', 'Uthman', 'Ali', 'Khalid', 'Bilal', 'Zaid', 'Talha', 'Saad', 'AbdurRahman' ];

        return [ 
            'user_id'    => User::factory (), // Relasi dengan factory User
            'nip'        => $this->faker->unique ()->numerify ( '##########' ),
            'class_name' => $this->faker->numberBetween ( 1, 9 ) . '-' . $this->faker->randomElement ( $sahabatNames ),
        ];
    }

    public function customData ( array $data ) : static
    {
        return $this->state ( function (array $attributes) use ($data)
        {
            return [ 
                'user_id'    => $data[ 'user_id' ] ?? $attributes[ 'user_id' ],
                'nip'        => $data[ 'nip' ] ?? $attributes[ 'nip' ],
                'class_name' => $data[ 'class_name' ] ?? $attributes[ 'class_name' ],
            ];
        } );
    }
}
