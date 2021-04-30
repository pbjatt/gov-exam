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

Route::get('/pdf', function () {
    return view('frontend.template.currentpdf');
});


Route::group([], function () {
    Route::get('/', 'HomeController@examlist')->name('home');
    Route::get('/examlist', 'HomeController@index');
    Route::get('/currentaffair', 'CurrentAffairController@currentaffair')->name('currentaffair');
    Route::get('/currentaffair/detail/{slug}', 'CurrentAffairController@currentaffairdetail')->name('currentaffairdetail');
    // Route::post('/currentaffair/currentaffairsearch', 'CurrentAffairController@currentaffairsearch')->name('search');
    Route::get('/currentaffair/currentaffairpdf', 'CurrentAffairController@currentaffairpdf')->name('pdf');
    Route::get('exam/{slug}', 'HomeController@examdetails');
    Route::post('examsearch', 'AjexController@examsearch');
    Route::get('notification/{slug}', 'HomeController@notification');
    Route::get('notification/{slug}/{infoslug}', 'HomeController@notificationinfo');

    Route::get('blog/{slug}', 'HomeController@blogdetail');

    Route::get('/ajex/search', 'AjexController@search');
    Route::get('/ajex/bloglist', 'AjexController@blogscroll');
    Route::get('/ajex/blogcomment', 'AjexController@blogcomment');
});


Route::group(['prefix' => '/account', 'as' => 'account.'], function () {
    Route::get('login', 'UserController@getLogin')->name('login');
    Route::post('login', 'UserController@postLogin')->name('login.post');
    Route::get('register', 'UserController@getRegister')->name('register');
    Route::post('register', 'UserController@postRegister')->name('register.post');
    Route::get('/forget-password', 'UserController@getEmail')->name('forgetpassword');
    Route::post('/forget-password', 'UserController@postEmail')->name('forgetpassword.post');
    Route::get('/reset-password/{token}', 'UserController@getPassword')->name('resetpassword');
    Route::post('/reset-password', 'UserController@updatePassword')->name('resetpassword.post');
    Route::get('/verify/{otp_token}', 'UserController@getVerify')->name('verify');
    Route::get('logout', 'UserController@logout')->name('logout');
});
Route::group(['middleware' => 'userauth', 'prefix' => '/user', 'as' => 'user.', 'namespace' => 'user'], function () {
    Route::post('/question/import-excel', 'QuestionController@importExcel')->name('import.post');
    Route::get('/question/download-sample', 'QuestionController@downloadSample')->name('download');
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::resources([
        'blog' => 'BlogController',
        'question' => 'QuestionController',
    ]);
});
