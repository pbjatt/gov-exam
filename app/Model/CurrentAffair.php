<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CurrentAffair extends Model
{
    protected $guarded = [];

    protected $appends = ['categories'];

    public function getCategoriesAttribute()
    {
        return !empty($this->category->title) ? $this->category->title : null;
    }

    public function category()
    {
        return $this->belongsTo(CurrentAffairCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($q)
    {
        if (request('year')) {
            $q->where('year', request('year'));
        }
        if (request('month')) {
            $q->where('month', request('month'));
        }
        if (request('day')) {
            $q->where('day', request('day'));
        }
        if (request('category_id')) {
            $q->where('category_id', request('category_id'));
        }

        return $q;
    }
}
