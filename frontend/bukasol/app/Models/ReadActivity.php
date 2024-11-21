<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReadActivity extends Model
{
    use HasFactory;

    protected $table = 'read_activities';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [ 
        'student_id',
        'time_stamp',
        'book_title',
        'page',
        'teacher_sign',
        'parent_sign',
    ];

    protected function casts () : array
    {
        return [ 
            'id'           => 'integer',
            'student_id'   => 'integer',
            'time_stamp'   => 'date',
            'book_title'   => 'string',
            'page'         => 'string',
            'teacher_sign' => 'boolean',
            'parent_sign'  => 'boolean',
        ];
    }

    public function student ()
    {
        return $this->belongsTo ( Student::class);
    }
}
