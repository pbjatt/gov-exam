<?php

namespace App\Http\Controllers\api;

use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'     => 'required|string|regex:/\d{10}/',
            'password'   => 'required'
        ]);
        if ($validator->fails()) {
            $re = [
                'status'    => false,
                'message'   => 'Validations errors found.',
                'errors'    => $validator->errors()
            ];
        } else {
            // Check if mobile number exists or not
            $user = User::where('mobile', request('mobile'))->first();
            if (!empty($user->id)) {
                if ($user->mobile_verify == 'true') {
                    $credentials = $request->only('mobile', 'password');
                    $remember    = !empty($request->remember) ? true : false;

                    if (Auth::attempt($credentials, $remember)) {
                        $user = Auth::user();
                        $input = [
                            'device_type'   => request('device_type'),
                            'device_id'     => request('device_id'),
                            'fcm_id'        => request('fcm_id')
                        ];

                        $user->fill($input)->save();
                        // dd($user);
                        // $token  = $user->createToken('multi-vender')->accessToken;
                        $token = $user->createToken('Gov-Exam')->accessToken;
                        // dd($token);
                        if ($user->email_verified == 'true') {
                            $re = [
                                'status'    => true,
                                'email_verify' => true,
                                'message'   => 'Success!! Login successfully.',
                                'data'      => $user,
                                'token'     => $token,
                            ];
                        } else {
                            $re = [
                                'status'    => true,
                                'email_verify' => false,
                                'message'   => 'Success!! Login successfully.',
                                'data'      => $user,
                                'token'     => $token,
                            ];
                        }
                    } else {
                        $re = [
                            'status'    => false,
                            'message'   => 'Error!! Credentials not matched.',
                        ];
                    }
                } else {
                    $re = [
                        'status'    => false,
                        'message'   => 'Error!! Mobile number not verified. please verify.',
                    ];
                }
            } else {
                $re = [
                    'status'    => false,
                    'message'   => 'Error!! Credentials not matched.',
                ];
            }
        }
        return response()->json($re);
    }

    public function forgotpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile'           => 'required|string|regex:/\d{10}/',
            'new_password'     => 'required|string|min:6|same:new_password',
            'confirm_password' => 'required|string|min:6|same:new_password'
        ]);
        if ($validator->fails()) {
            $re = [
                'status'    => false,
                'message'   => 'Validations errors found.',
                'errors'    => $validator->errors()
            ];
        } else {
            $user = User::where('mobile', request('mobile'))->first();

            $new_password = Hash::make($request->new_password);
            $user = $user->fill(['password' => $new_password])->save();

            $re = [
                'status'    => true,
                'message'   => 'Success! Password has been updated.',
            ];
        }
        return response()->json($re);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->device_id = '';
        $user->save();
        $re = [
            'status'    => true,
            'message'   => 'Success! You are logout successfully.',
        ];

        return response()->json($re);
    }
}
