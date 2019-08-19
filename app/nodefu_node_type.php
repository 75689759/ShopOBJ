<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nodefu_node_types extends Model
{
    protected $table = 'nodefu_node_types';
    protected $fillable = [
        'nodefu_id',
        'node_type_id'
    ];
}
