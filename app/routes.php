<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'login.check'), function()
{
    Route::get('/', function()
    {
        return Redirect::to('/application');
    });

    Route::resource('/application', 'ApplicationController');
    Route::resource('/plugin', 'PluginController');
    Route::resource('/setting', 'SettingController');

});