<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wangcai extends Model
{
    protected $table = 'waicai';
    protected $fillable = [
        'id',
        'name',
        'explain',
        'astatus'
    ];
}
