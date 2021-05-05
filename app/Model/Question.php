<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'option_5',
        'correct_answer',
        'difficulty',
        'category_id',
        'description'
    ];

    protected $appends = ['categories', 'users'];

    public function getCategoriesAttribute() {
        return !empty($this->category->title) ? $this->category->title : null;
    }

    public function getUsersAttribute() {
        return !empty($this->user->name) ? $this->user->name : null;
    }

    public function category() {
        return $this->belongsTo(Exam_category::class, 'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
