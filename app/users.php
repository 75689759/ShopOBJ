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

    public function users_info()
    {
        return $this->hasOne(users_info::class);
    }
}
