<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    public function datas()
    {
        return $this->hasMany('App\Model\Data');
    }
}
