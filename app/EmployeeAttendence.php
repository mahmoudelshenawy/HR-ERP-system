<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendence extends Model
{
    protected $guarded = [];

    public function employee_name()
    {
        return $this->belongsTo(\App\EmployeeGeneralData::class, 'employee_code');
    }
}
// ->select('employee_general_data.employee_name')