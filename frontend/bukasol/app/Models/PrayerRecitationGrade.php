<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrayerRecitationGrade extends Model
{
    use HasFactory;

    protected $table = 'prayer_recitation_grades';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [ 
        'student_id',
        'time_stamp',
        'reading_category',
        'grade_semester1',
        'grade_semester2',
        'teacher_sign',
        'parent_sign',
    ];

    protected function casts () : array
    {
        return [ 
            'id'               => 'integer',
            'student_id'       => 'integer',
            'time_stamp'       => 'date',
            'reading_category' => 'string',
            'grade_semester1'  => 'double',
            'grade_semester2'  => 'double',
            'teacher_sign'     => 'boolean',
            'parent_sign'      => 'boolean',
        ];
    }

    public function student ()
    {
        return $this->belongsTo ( Student::class);
    }
}
