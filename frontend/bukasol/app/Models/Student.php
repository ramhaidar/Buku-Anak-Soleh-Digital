<?php

namespace App\Models;

use App\Models\Juz;
use App\Models\Note;
use App\Models\User;
use App\Models\Teacher;
use App\Models\PrayerGrade;
use App\Models\ReadActivity;
use App\Models\MuhasabahReport;
use App\Models\ViolationReport;
use App\Models\PrayerRecitationGrade;
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

    public function user ()
    {
        return $this->belongsTo ( User::class);
    }

    public function teacher ()
    {
        return $this->belongsTo ( Teacher::class);
    }

    public function juz ()
    {
        return $this->hasMany ( Juz::class);
    }

    public function muhasabahReports ()
    {
        return $this->hasMany ( MuhasabahReport::class);
    }

    public function notes ()
    {
        return $this->hasMany ( Note::class);
    }

    public function prayerGrades ()
    {
        return $this->hasMany ( PrayerGrade::class);
    }

    public function prayerRecitationGrades ()
    {
        return $this->hasMany ( PrayerRecitationGrade::class);
    }

    public function readActivities ()
    {
        return $this->hasMany ( ReadActivity::class);
    }

    public function violationReports ()
    {
        return $this->hasMany ( ViolationReport::class);
    }
}
