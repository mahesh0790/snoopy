<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $casts = [
        'boards' => 'array',
        'mediums' => 'array',
        'facilities' => 'array',
        'school_types'=>'array'
    ];
    protected $fillable = [
         'school_name','area','city','pincode','boards','mobile_number','email','website','max_students_per_class','mediums','facilities','school_types','admission_start_date','admission_end_date','extra_activities','school_image','created_by'
            ];

    public function createdBy(){
        return $this->belongsTo('App\Admin', 'created_by');
    }
}
