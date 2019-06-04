<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolPhoto extends Model
{
    protected $fillable = ['school_id','filename'];    

    public function school(){
        return $this->belongsTo('App\School');
    }
}
