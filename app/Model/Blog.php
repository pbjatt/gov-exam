<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    protected $appends = ['categories'];

    public function getCategoriesAttribute()
    {
        return !empty($this->category->title) ? $this->category->title : null;
    }

    public function category()
    {
        return $this->belongsTo(Exam_category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function list()
    {
        $blogs = \DB::table('blogs')
            ->where('status', 'verified')
            ->select('blogs.id', 'blogs.blog_title', 'blogs.blog_slug', 'blogs.blog_short_desc', 'blogs.status', 'blogs.category_id', 'blogs.user_id', 'blogs.post_type', 'blogs.blog_image', 'blogs.created_at');

        $notification = \DB::table('notification_infos')
            ->select('notification_infos.id', 'notification_infos.title AS blog_title', 'notification_infos.slug', 'notification_infos.short_description', 'notification_infos.status', 'notification_infos.examnotification_id AS category_id', 'notification_infos.info_type_id AS user_id', 'notification_infos.post_type', 'notification_infos.image', 'notification_infos.created_at');


        $merge = $blogs->unionAll($notification);
        $search = \DB::table(\DB::raw("({$merge->toSql()}) AS mg"))->latest()->mergeBindings($merge)->paginate(10);

        return $search;
    }
}
