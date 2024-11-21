<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'name',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [ 
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts () : array
    {
        return [ 
            'id'       => 'integer',
            'name'     => 'string',
            'username' => 'string',
            'password' => 'hashed',
            'role'     => 'string',
        ];
    }

    public function student ()
    {
        return $this->hasOne ( Student::class);
    }

    public function teacher ()
    {
        return $this->hasOne ( Teacher::class);
    }
}
