<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->hasOne('App\Model\Question', 'id', 'question_id');
    }
    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }
}
