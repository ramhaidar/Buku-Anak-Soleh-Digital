<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuhasabahReport extends Model
{
    use HasFactory;

    protected $table = 'muhasabah_reports';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [ 
        'student_id',
        'time_stamp',
        'surah_name',
        'surah_ayat',
        'sunnah_pray',
        'subuh_pray',
        'dzuhur_pray',
        'ashar_pray',
        'maghrib_pray',
        'isya_pray',
        'teacher_sign',
        'parent_sign',
    ];

    protected function casts () : array
    {
        return [ 
            'id'           => 'integer',
            'student_id'   => 'integer',
            'time_stamp'   => 'date',
            'surah_name'   => 'string',
            'surah_ayat'   => 'string',
            'sunnah_pray'  => 'boolean',
            'subuh_pray'   => 'boolean',
            'dzuhur_pray'  => 'boolean',
            'ashar_pray'   => 'boolean',
            'maghrib_pray' => 'boolean',
            'isya_pray'    => 'boolean',
            'teacher_sign' => 'boolean',
            'parent_sign'  => 'boolean',
        ];
    }

    public function student ()
    {
        return $this->belongsTo ( Student::class);
    }
}
