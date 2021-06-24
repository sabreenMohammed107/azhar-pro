<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_no','image','capacity','building_id'
    ];

    public function building(){
        return $this->belongsTo('App\Models\Building','building_id');
    }
}
