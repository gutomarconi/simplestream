<?php

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');
});

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout', 'AuthController@logout');
    Route::get('profile', 'AuthController@getProfile');
    Route::get('channels', 'ChannelController@getList')->name('channels');
    Route::get('channels/{channelId}/programme/{programmeId}', 'ProgrammeController@get')
        ->name('programme');
    Route::get('channels/{channelId}/{date}/{timezone}', 'TimetableController@get')
        ->where('timezone', '.*')
        ->name('timetable');
});
