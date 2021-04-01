<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $guarded = [];

    public function exam_category()
    {
        return $this->hasOne('App\Model\Exam_category', 'id', 'exam_category_id');
    }
}
