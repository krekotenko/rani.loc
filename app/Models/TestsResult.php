<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestsResult extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'result',
    ];
}
