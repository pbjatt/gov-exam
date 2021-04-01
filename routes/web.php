<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('admin', function () {
    return false;
});

// Route::group(['namespace' => 'App\Http\Controllers'], function() {
//     Route::group(['prefix' => '/account', 'as' => 'account.'], function() {
//         Route::get('login','UserAuthController@getLogin')->name('login');
// 	    Route::post('login', 'UserAuthController@postLogin')->name('login.post');
// 	    Route::get('register','UserAuthController@getRegister')->name('register');
// 	    Route::post('register', 'UserAuthController@postRegister')->name('register.post');
// 	    Route::get('logout', 'UserAuthController@logout')->name('logout');
//     });
//     Route::group(['middleware' => 'userauth'], function () {
//         Route::get('/', 'HomeController@index')->name('home');
//     });
// });


Route::group([], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/examlist', 'HomeController@examlist');
    Route::post('examsearch', 'HomeController@ajex');
    Route::get('exam/{slug}', 'HomeController@examdetails');
    Route::get('examsearch', 'HomeController@examsearch');
    Route::get('notification/{slug}', 'HomeController@notification');
});
