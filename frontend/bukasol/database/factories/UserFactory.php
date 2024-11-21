<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition ()
    {
        return [ 
            'name'     => $this->faker->name,
            'username' => $this->faker->unique ()->userName,
            'password' => Hash::make ( 'admin123' ), // Default password hashed
            'role'     => 'Admin', // Default role as 'user'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified () : static
    {
        return $this->state ( fn ( array $attributes ) => [ 
            'email_verified_at' => null,
        ] );
    }

    /**
     * Custom data state to accept various parameters.
     *
     * @param array $data
     * @return static
     */
    public function customData ( array $data ) : static
    {
        return $this->state ( function (array $attributes) use ($data)
        {
            return [ 
                'name'     => $data[ 'name' ] ?? $attributes[ 'name' ],
                'username' => $data[ 'username' ] ?? $attributes[ 'username' ],
                'password' => isset ( $data[ 'password' ] ) ? Hash::make ( $data[ 'password' ] ) : $attributes[ 'password' ],
                'role'     => $data[ 'role' ] ?? $attributes[ 'role' ],
            ];
        } );
    }
}
