<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Model\Setting;
use App\Model\Menuslider;
use App\Model\MenuItem;

use Auth;
use Hash;
use App\User;
use App\Model\Coupan;
use App\Model\Coupanapply;
use App\Model\Newsletter;
use App\Model\Reservation;
use App\Model\Fevorite;
use App\Model\Point;

class AjaxController extends Controller
{
    public function sendOtp(Request $request)
    {

        return response()->json($re, 200);
    }
}
