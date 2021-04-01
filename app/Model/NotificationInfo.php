<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NotificationInfo extends Model
{
    protected $guarded = [];

    public function infotype()
    {
        return $this->hasOne('App\Model\InfoType', 'id', 'info_type_id');
    }
}
