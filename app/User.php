<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    
    protected $fillable =
    [
        'title', 'genre', 'plot', 'code', 'Number', 'Password'
    ];

    public $timestamps = false;

    
}
