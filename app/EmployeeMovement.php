<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMovement extends Model
{
    //

    public function employee(){
        return $this->belongsToMany('App\EmployeeGeneralData');
    }
}
