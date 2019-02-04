<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactApplication extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'contact_method',
        'contact_method_login',
        'text',
    ];
}
