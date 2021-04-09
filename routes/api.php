<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'api'], function () {
    Route::post('/register', 'RegisterController@register');
    Route::post('/otp_verify', 'RegisterController@verifyotp');
    // Route::post('/mail_verify', 'RegisterController@verifymail');
    Route::post('/send_otp', 'RegisterController@sendotp');
    // Route::post('/send_otp_mail', 'RegisterController@sendotpmail');

    Route::post('/login', 'LoginController@login');
    Route::post('/forgotpassword', 'LoginController@forgotpassword');


    Route::get('/category', 'HomeController@category');
    Route::get('/exam', 'HomeController@exam');
});

Route::group(['namespace' => 'api', 'middleware' => 'auth:api'], function () {

    Route::get('/logout', 'LoginController@logout');

    Route::get('/home', 'HomeController@index');
});
