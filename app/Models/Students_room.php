<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students_room extends Model
{
    //
    protected $fillable = [
        'student_id',
    'room_id',
    'education_year_id',
    'notes',
    ];
    
}
