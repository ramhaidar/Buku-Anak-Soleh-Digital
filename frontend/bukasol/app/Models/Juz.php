<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juz extends Model
{
    use HasFactory;

    protected $table = 'juz';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [ 
        'student_id',
        'time_stamp',
        'juz_number',
        'surah_name',
        'surah_ayat',
        'teacher_sign',
    ];

    protected function casts () : array
    {
        return [ 
            'id'           => 'integer',
            'student_id'   => 'integer',
            'time_stamp'   => 'date',
            'juz_number'   => 'integer',
            'surah_name'   => 'string',
            'surah_ayat'   => 'string',
            'teacher_sign' => 'boolean',
        ];
    }

    public function student ()
    {
        return $this->belongsTo ( Student::class);
    }
}
