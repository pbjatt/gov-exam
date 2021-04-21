<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $guardData = Auth::guard()->user();

        $page = 'homepage';
        $title = 'User Admin Dashboard ';
        $data = compact('page', 'title', 'setting', 'guardData');

        return view('frontend.layout.user.app', $data);
    }

    public function profile()
    {
        $setting = Setting::first();

        $guardData = Auth::guard()->user();

        $page = 'profile.profile';
        $title = 'User Profile';
        $data = compact('page', 'title', 'setting', 'guardData');

        return view('frontend.layout.user.app', $data);
    }
}
