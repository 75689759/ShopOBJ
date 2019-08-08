<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cates extends Model
{
    protected $table = 'cates';

    protected $fillable = [
    	'cname',
    	'pid',
    	'path'
    ];
}
