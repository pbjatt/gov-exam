<?php

namespace App\Http\Controllers;

use App\Model\Setting;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UserController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('frontend.inc.user.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        $field = 'login';
        if (is_numeric($request->input('login'))) {
            $field = 'mobile';
            $errMessage = 'Phone number is not exists.';
        } else if (filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
            $errMessage = 'Email is not exists.';
        } else {
            $field = 'email';
            $errMessage = 'Please Provide Valid Credentials';
        }

        $user_count = User::where($field, $request->login)->count();

        if (!$user_count) {
            return redirect()->back()->with('error', 'Login Failed!!' . $errMessage);
        } else {
            $request->validate($rules);

            $user = User::where($field, $request->login)->first();

            if ($user->verified == 1) {
                $user = Auth::attempt([
                    $field => $request->login,
                    'password'    => $request->password
                ]);

                if ($user) {
                    return redirect(route('home'));
                } else {
                    $e = "Your Mobile Number or password are wrong";
                    return back()->with('error', $e);
                }
            } else {
                $e = "Your Account is not verfied";
                return redirect()->back()->with('error', $e);
            }
        }
    }

    public function getRegister()
    {
        return view('frontend.inc.user.register');
    }

    public function postRegister(Request $request, User $user)
    {

        $rules = [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:10|unique:users|regex:/[0-9]{10}/',
            'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@&^!$#%]).*$/|min:7',
        ];

        $messages = [
            'password.min' => 'Password Contain atleast 7 digits',
            'password.regex'   => 'Password must contain at least one number and both uppercase and lowercase letters and one symbol.',
        ];

        $setting = Setting::first();

        $request->validate($rules, $messages);

        $otp_token = Str::random(64);

        $password = Hash::make($request->password);

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $password,
            'otp_token' => $otp_token,
            'role_id' => '2'
        ]);

        Mail::send('frontend.inc.user.verify_otp', ['otp_token' => $otp_token], function ($message) use ($request, $setting) {
            $message->to($request->email);
            $message->subject('OTP Verification');
            $message->from(env('MAIL_USERNAME'), $setting->title);
        });
        
        $user->save();


        return redirect(route('home'));
    }

    public function getVerify($otp_token)
    {
        $verify = User::where('otp_token', $otp_token)->first();
        if (isset($verify)) {
            if (!$verify->verified) {
                User::where('email', $verify->email)
                    ->update(['verified' => 1, 'email_verified_at' => now()]);
                $e = "Your account is verified. You can now login.";
                return redirect(route('account.login'))->with('status', $e);
            } else {
                $e = "Your e-mail is already verified. You can now login.";
                return redirect(route('account.login'))->with('status', $e);
            }
        } else {
            $e = "Sorry your email cannot be identified.";
            return redirect(route('account.login'))->with('status', $e);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $value = 'You are logout successfully';
        $request->session()->put('success', $value);
        return redirect(route('account.login'));
    }

    public function getEmail()
    {
        return view('frontend.inc.user.forgetpassword');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $setting = Setting::first();

        $token = Str::random(64);

        $user = User::where('email', $request->email)->first();
        $user->fill([
            'remember_token' => $token
        ]);

        $user->save();

        Mail::send('frontend.inc.user.email', ['token' => $token], function ($message) use ($request, $setting) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
            $message->from(env('MAIL_USERNAME'), $setting->title);
        });


        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function getPassword($token)
    {
        return view('frontend.inc.user.resetpassword', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {

        $rules = [
            'token' => 'required',
            'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@&^!$#%]).*$/|min:7',
            'password_confirmation' => 'required_with:password|same:password|min:7'
        ];

        $messages = [
            'password.regex'   => 'Password must contain at least one number and both uppercase and lowercase letters and one symbol.',
        ];

        $request->validate($rules, $messages);

        User::where('remember_token', $request->token)
            ->update(['password' => Hash::make($request->password)]);

        return redirect(route('account.login'))->with('message', 'Your password has been changed!');
    }
}
