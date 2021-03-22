<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionPermission extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(\App\EmployeeGeneralData::class, 'employee_id');
    }
}
