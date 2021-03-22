<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsencePenalty extends Model
{
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(\App\BusinessBranch::class, 'branch_id');
    }
}
