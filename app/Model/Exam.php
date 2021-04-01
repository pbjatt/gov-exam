<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    public function exam_age()
    {
        return $this->hasOne('App\Model\Age', 'id', 'age');
    }
    public function category()
    {
        return $this->hasOne('App\Model\Exam_category', 'id', 'category_id');
    }
    public function exam_qualification()
    {
        return $this->hasOne('App\Model\Qualification', 'id', 'qualification');
    }
}
