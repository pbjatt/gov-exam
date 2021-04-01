<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Model\User;

class DashboardController extends BaseController
{
    public function index()
    {
        $user = User::whereNotIn('id', [1])->get();
        
    	$page = 'homepage';
        $title = 'Master Admin Dashboard ';
        $data = compact('page','title','user');

        $guard = Auth::guard()->user()->role_id;
        // dd(Auth::guard()->user()->role);
        
		return view('backend.layout.master', $data);
    }

}
