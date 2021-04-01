<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $casts = [
    	'created_at'	=> 'datetime: d M Y h:i A',
    	'updated_at'	=> 'datetime: d M Y h:i A',
    ];
    protected $hidden = [
        'seo_title','seo_keywords','seo_description'
    ];
}
