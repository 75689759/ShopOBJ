<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table = 'shipping';
    protected $fillable = [
        'users_id',
        'name',
        'phone',
        'acode',
        'address'
    ];
}
