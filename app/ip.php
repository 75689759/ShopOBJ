<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ip extends Model
{
    protected $table = 'ip';
    protected $fillable = [
        'users_id',
        'ip',
        'vtime',
        'terrace'
    ];
}
