<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendanceRule extends Model
{
    //

    protected $fillable = [
       'employee_id','day','check_in','check_out'
    ];

    public function employee(){
        return $this->belongsTo('App\EmployeeGeneralData','employee_id');
    }
}
