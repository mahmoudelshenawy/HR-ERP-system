<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $guarded = [];

    protected $appends = ['day'];

    public function getDayAttribute()
    {
        return date('D', strtotime($this->attributes['date']));
    }
}
