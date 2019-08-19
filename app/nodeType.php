<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nodeType extends Model
{
    protected $table = 'node_type';
    protected $fillable = [
        'nodetype'
    ];

    public function node()
    {
        return $this->hasOne(node::class);
    }

    public function tag()
    {
        return $this->belongsToMany(
            nodefu::class,
            'nodefu_node_types',
            'node_type_id',
            'nodefu_id'
        );
    }
}
