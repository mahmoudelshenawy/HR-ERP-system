<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAllowance extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(\App\EmployeeGeneralData::class, 'employee_id');
    }

    public function fixed_allowance()
    {
        return $this->belongsTo(\App\FixedAllowance::class, 'allowance_id');
    }
}
