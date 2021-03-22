<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(\App\EmployeeGeneralData::class, 'employee_id');
    }

    public function fixed_deduction()
    {
        return $this->belongsTo(\App\FixedDeduction::class, 'deduction_id');
    }
}
