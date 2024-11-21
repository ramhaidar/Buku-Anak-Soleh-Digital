<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [ 
        'user_id',
        'nip',
        'class_name',
    ];

    protected function casts () : array
    {
        return [ 
            'id'         => 'integer',
            'user_id'    => 'integer',
            'nip'        => 'string',
            'class_name' => 'string',
        ];
    }

    public function user ()
    {
        return $this->belongsTo ( User::class);
    }

    public function students ()
    {
        return $this->hasMany ( Student::class);
    }
}
