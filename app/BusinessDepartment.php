<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDepartment extends Model
{
    //
    public static function where(string $string, $business_department_id)
    {
    }

    public function administration()
    {
        return $this->belongsTo('App\BusinessAdministration', 'business_administration_id');
    }
    public function job()
    {
        return $this->hasMany('App\BusinessJob', 'job_id');
    }
}
