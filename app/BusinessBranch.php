<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessBranch extends Model
{
    //
    protected $table = 'business_branches';

    public function businessType()
    {
        return $this->belongsTo('App\BusinessType', 'business_type_id');
    }

    public function administration()
    {
        return $this->hasMany('App\BusinessAdministration', 'business_branche_id');
    }

    public function branch_attendance_rules()
    {
        return $this->hasMany('App\BranchAttendanceRules', 'branch_id');
    }

    public function custom_attendence()
    {
        return $this->hasMany('App\CustomeEmployeeAttendenceRule', 'branch_id');
    }

    public function delayPenalties()
    {
        return $this->hasMany('App\DelayPenalty', 'branch_id');
    }

    public function absencePenalties()
    {
        return $this->hasMany('App\AbsencePenalty', 'branch_id');
    }
    public function deletedExistedRules()
    {
        $this->branch_attendance_rules()->delete();
    }

    public function deletedExistedPenalties()
    {
        $this->delayPenalties()->delete();
    }
    public function deletedExistedAbsencePenalties()
    {
        $this->absencePenalties()->delete();
    }

    public function delete_relations()
    {
        $this->branch_attendance_rules()->delete();
        $this->delayPenalties()->delete();
        $this->custom_attendence()->delete();
        $this->absencePenalties()->delete();
    }
}
