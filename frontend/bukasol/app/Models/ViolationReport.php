<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViolationReport extends Model
{
    use HasFactory;

    protected $table = 'violation_reports';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [ 
        'student_id',
        'time_stamp',
        'violation_details',
        'consequence',
        'teacher_sign',
    ];

    protected function casts () : array
    {
        return [ 
            'id'                => 'integer',
            'student_id'        => 'integer',
            'time_stamp'        => 'date',
            'violation_details' => 'string',
            'consequence'       => 'string',
            'teacher_sign'      => 'boolean',
        ];
    }
}
