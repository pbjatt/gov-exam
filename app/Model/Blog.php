<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Exam_category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
