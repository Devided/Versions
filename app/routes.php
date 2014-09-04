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

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
    {
        return Redirect::to('/overview');
    });

    Route::get('/overview', 'OverviewController@index');
    Route::resource('/application', 'ApplicationController');
    Route::resource('/plugin', 'PluginController');
    Route::get('/setting', 'SettingController@index');
    Route::put('/setting', 'SettingController@update');
});

Route::get('/api/{id}/js', 'APIController@js');
Route::get('/api/{id}/css', 'APIController@css');