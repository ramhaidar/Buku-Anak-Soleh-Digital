<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
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
}
