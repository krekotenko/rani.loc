<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    protected $table = 'stories';

    protected $fillable = [
        'name',
        'location',
        'what_do',
        'reason',
        'influence',
        'take_away_key',
        'experience',
        'recommendation',
        'image_uploads',
    ];
}
