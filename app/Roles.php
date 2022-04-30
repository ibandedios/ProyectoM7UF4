<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $fillable = [
        'rol', 'desc'
    ];

    public function user(){
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
