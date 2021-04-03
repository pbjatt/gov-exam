<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest', 'namespace' => 'admin'], function () {
    Route::any('/login', 'UserController@index')->name('login');
    Route::post('main/checklogin', 'UserController@checklogin')->name('checklogin');
});

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {
    Route::get('logout', 'UserController@logout');
    Route::get('/', 'DashboardController@index')->name('admin-home');
});

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin', 'as' => 'admin.'], function () {

    Route::resources([
        'role'              => 'RoleController',
        'age'               => 'AgeController',
        'examcategory'      => 'ExamCategoryController',
        'qualification'     => 'QualificationController',
        'exam'              => 'ExamController',
        'examnotification'  => 'ExamNotificationController',
        'syllabus'          => 'SyllabusController',
    ]);

    Route::get('examnotification/master/view', 'ExamNotificationController@master')->name('notification.master');
    Route::get('examnotification/submaster/view', 'ExamNotificationController@submaster')->name('notification.submaster');

    Route::resources([
        'examdata'       => 'ExamDataController',
        'notificationinfo'       => 'NotificationInfoController',
        'notificationsyllabus'       => 'NotificationSyllabusController',
        'notificationresult'       => 'NotificationResultController',
        'infotype'       => 'InfoTypeController',
    ]);

    Route::resources([
        'about'         => 'AboutusController',
        'slider'        => 'SliderController',
        'faq'           => 'FaqController',
        'service'       => 'ServiceController',
        'termcondition' => 'TermconditionController',
    ]);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@list');
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'UserController@profile');
        Route::post('/', 'UserController@edit_profile');
    });

    Route::group(['prefix' => 'setting'], function () {
        Route::get('/', 'SettingController@edit');
        Route::post('/', 'SettingController@update');
    });
});
