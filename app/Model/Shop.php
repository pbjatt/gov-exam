<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
	protected $guarded = [];

    protected $hidden = [
        'seo_title','seo_keywords','seo_description'
    ];

	public function shopdata()
    {
        return $this->hasOne('App\Model\Shopdata', 'shop_id', 'id');
    }
    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }
    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
}
