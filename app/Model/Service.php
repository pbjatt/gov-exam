<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'seo_title','seo_keywords','seo_description',
    ];
}
