<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parennt extends Model
{
     //main settings
     protected $table = 'parents';
     protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    'mobile',
    'phone',
    'parent_relation_id',
    'address',
    'job',
    'nid',
    'nid_issue_place',
    'nid_issue_date',
    'student_id',
    'notes',
    ];
    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
    public function parent_relation(){
        return $this->belongsTo('App\Models\Parent_relation','parent_relation_id');
    }
}
