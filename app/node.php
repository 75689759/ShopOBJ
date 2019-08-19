<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class node extends Model
{
    protected $table = 'node';
    protected $fillable = [
        'node_name',
        'controller',
        'method'
    ];

    public function nodefu()
    {
        return $this->belongsToMany(
            nodefu::class,
            'node_nodefu',
            'node_id',
            'nodefu_id'
        );
    }

    public function roles()
    {
        return $this->belongsToMany(
            roles::class,
            'roles_node',
            'node_id',
            'roles_id'
        );
    }
}
