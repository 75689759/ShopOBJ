<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_info extends Model
{
    protected $table = 'users_info';
    protected $fillable = [
        'users_id',
        'profile',
        'sex',
        'jf',
        'browse',
        'paypwd'
    ];

    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
