<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];


    protected $attributes = ['picture_data'];
    protected $appends = ['picture_data'];

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

    public static function search($s)
    {
        $exams = \DB::table('exams')
            ->select('exams.id', 'exams.name AS name', 'exams.slug', 'exams.post_type');

        $notification = \DB::table('examnotifications')
            ->select('examnotifications.id', 'examnotifications.title AS name', 'examnotifications.slug', 'examnotifications.post_type');


        $merge = $exams->unionAll($notification);
        $search = \DB::table(\DB::raw("({$merge->toSql()}) AS mg"))->orderBy('name', 'ASC')->where('name', 'like', '%' . $s . '%')->mergeBindings($merge)->paginate(20);

        return $search;
    }
}
