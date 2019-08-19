<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles_node extends Model
{
    protected $table = 'roles_node';
    protected $fillable = [
        'roles_id',
        'node_id'
    ];
}
