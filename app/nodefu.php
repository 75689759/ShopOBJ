<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nodefu extends Model
{
    protected $table = 'nodefu';
    protected $fillable = [
        'nodefu_name'
    ];

    public function nodeType()
    {
        return $this->belongsToMany(
            nodeType::class,
            'nodefu_node_types',
            'nodefu_id',
            'node_type_id'
        );
    }

    public function node()
    {
        return $this->belongsToMany(
            node::class,
            'node_nodefu',
            'nodefu_id',
            'node_id'
        );
    }
}
