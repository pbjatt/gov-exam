<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamNotification extends Model
{
    protected $guarded = [];

    protected $table = 'examnotifications';

    public function exam()
    {
        return $this->belongsTo('App\Model\Exam');
    }

    public function notificationdetail()
    {
        return $this->hasOne('App\Model\NotificationInfo', 'examnotification_id', 'id');
    }
}
