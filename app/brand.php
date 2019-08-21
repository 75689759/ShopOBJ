<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    //
    protected $table = 'brand';
    protected $fillable = [
        'shop_id',
        'bname',
        'number',
        'blogo',
        'Country',
        'describe',
        'state'
    ];
}
