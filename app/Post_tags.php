<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_tags extends Model
{
    //
    protected $fillable = [
        'tag_id', 'post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
