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
    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    public function room(){
        return $this->belongsTo('App\Models\Room','room_id');
    }
    public function education(){
        return $this->belongsTo('App\Models\Education_year','education_year_id');
    }
}
