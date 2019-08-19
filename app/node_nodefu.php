<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class node_nodefu extends Model
{
    protected $table = 'node_nodefu';
    protected $fillable = [
        'node_id',
        'nodefu_id'
    ];
}
