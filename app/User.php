<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    
    protected $fillable =
    [
        'title', 'genre', 'plot', 'code'
    ];

    public $timestamps = false;

    
}
