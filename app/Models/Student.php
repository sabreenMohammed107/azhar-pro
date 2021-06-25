<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'accomodation_code',
    'mobile',
    'phone',
    'gender',
    'birth_date',
    'birth_place',
    'nid',
    'nid_issue_place',
    'nid_issue_date',
    'address',
    'city_id',
    'faculty_id',
    'faculty_code',
    'current_year_id',
    'division_id',
    'department_id',
    'user_id',
    'education_status_id',
    'current_grade_id',
    'guarantee_grade_img',
    'guarantee_work_img',
    'military_service_complete',
    'punishments',
    'notes',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function faculty(){
        return $this->belongsTo('App\Models\Faculty','faculty_id');
    }
    public function currentYear(){
        return $this->belongsTo('App\Models\Education_year','current_year_id');
    }
    public function division(){
        return $this->belongsTo('App\Models\Division','division_id');
    }
    public function department(){
        return $this->belongsTo('App\Models\Division','department_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\Education_status','education_status_id');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade','current_grade_id');
    }
}
