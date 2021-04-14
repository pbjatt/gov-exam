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
}
