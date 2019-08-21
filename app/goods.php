<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    protected $table = 'goods';

    protected $fillable = [
    	'brand_id',
    	'gnum',
    	'goods',
    	'antistop',
    	'original',
    	'unit',
    	'picname',
    	'store'
    ];
}
