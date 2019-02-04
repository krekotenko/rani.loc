<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerTransformation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'theme',
        'number_of_people',
        'location',
        'tell_me',
        'date',
    ];
}

