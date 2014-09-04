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

Route::get('/', function(){
    return Redirect::action('login');
});

Route::get('/login', [
    'uses'  => 'SessionsController@getLogin',
    'as'    => 'login'
]);
Route::post('/login', [
    'uses'  => 'SessionsController@postLogin',
    'as'    => 'login'
]);


Route::group(array('before' => 'auth'), function()
{
    Route::get('/', function()
    {
        return Redirect::to('/overview');
    });

    Route::get('/overview', [
        'uses'  =>  'OverviewController@index',
        'as'    =>  'dashboard'
    ]);

    Route::resource('/application', 'ApplicationController');
    Route::resource('/plugin', 'PluginController');
    Route::get('/setting', 'SettingController@index');
    Route::put('/setting', 'SettingController@update');
});

Route::get('/api/{id}/js', 'APIController@js');
Route::get('/api/{id}/css', 'APIController@css');