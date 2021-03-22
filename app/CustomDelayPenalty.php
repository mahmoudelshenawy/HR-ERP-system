<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomDelayPenalty extends Model
{
    protected $guarded = [];

    public function adminstration()
    {
        return $this->hasOne(\App\BusinessAdministration::class , 'administration_id');
    }
}
