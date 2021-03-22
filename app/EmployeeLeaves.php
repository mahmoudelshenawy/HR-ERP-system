<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    protected $fillable =['employee_id','leave_type_id','start_day','end_day','status'];
}
