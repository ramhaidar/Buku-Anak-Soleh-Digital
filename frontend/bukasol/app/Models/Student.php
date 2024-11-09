<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [ 
        'user_id',
        'teacher_id',
        'nisn',
        'class_name',
        'parent_name',
        'parent_code',
    ];

    protected function casts () : array
    {
        return [ 
            'id'          => 'integer',
            'user_id'     => 'integer',
            'teacher_id'  => 'integer',
            'nisn'        => 'string',
            'class_name'  => 'string',
            'parent_name' => 'string',
            'parent_code' => 'string',
        ];
    }
}
