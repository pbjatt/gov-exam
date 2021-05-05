<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $guarded = [];

    public function blog()
    {
        return $this->hasOne('App\Model\Blog', 'id', 'blog_id');
    }
    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }

}
