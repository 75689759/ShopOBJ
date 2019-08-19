<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'roles',
        'deriction'
    ];

    public function node()
    {
        return $this->belongsToMany(
            node::class,
            'roles_node',
            'roles_id',
            'node_id'
        );
    }
}
