<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $hidden = [
        'seo_title','seo_keywords','seo_description'
    ];

    public function productdata()
    {
        return $this->hasOne('App\Model\Product_data', 'product_id', 'id');
    }
    public function productvarient()
    {
        return $this->hasMany('App\Model\Product_varient', 'product_id', 'id');
    }
    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
    public function brand()
    {
        return $this->hasOne('App\Model\Brand', 'id', 'brand_id');
    }
    public function shop()
    {
        return $this->hasOne('App\Model\Shop', 'id', 'shop_id');
    }
}
