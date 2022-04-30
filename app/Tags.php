<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = [
        'tag', 'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
