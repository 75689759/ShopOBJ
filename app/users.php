<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'uname',
        'pwd',
        'email',
        'phone',
        'state',
        'remember_token'
    ];
}
