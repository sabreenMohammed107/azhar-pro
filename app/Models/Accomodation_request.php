<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accomodation_request extends Model
{
    protected $fillable = [
        'request_no', 'accomodation_code',
    'student_id',
    'education_year_id',
    'request_date',
    'request_status_id',
    'notes',
    ];

    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    public function education(){
        return $this->belongsTo('App\Models\Education_year','education_year_id');
    }
    public function status(){
        return $this->belongsTo('App\Models\Requests_status','request_status_id');
    }
}
