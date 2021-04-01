<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $guarded = [];

	public function role()
    {
        return $this->hasOne('App\Model\Role', 'id', 'role_id');
    }
    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    }
}
