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
    'as'    => 'login',
    'before' => 'csrf'
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
    Route::post('/application', ['as' => 'applications.store', 'uses' => 'ApplicationController@store', 'before' => 'csrf']);
    Route::patch('/application/{id}', ['uses' => 'ApplicationController@update', 'as' => 'applications.update', 'before' => 'csrf'] );
    Route::resource('/plugin', 'PluginController');
    Route::get('/settings', ['uses' => 'SettingController@index','as' => 'admin.settings']);
    Route::put('/settings', ['uses' => 'SettingController@update','as' => 'admin.settings', 'before' => 'csrf']);
    Route::get('/logout', ['uses' => 'SessionsController@destroy','as' => 'admin.logout']);

     //versions of plugins
    Route::get('/plugin/{pluginid}/version/create', ['uses' => 'VersionController@create','as' => 'plugin.version.create']);
    Route::post('/plugin/{pluginid}/version/create', ['uses' => 'VersionController@store','as' => 'plugin.version.store']);

    //link plugin to application
    Route::get('/application/{appid}/link', ['uses' => 'ApplicationController@link', 'as' => 'application.plugin.link']);
    Route::get('/application/{appid}/link/{pluginid}', ['uses' => 'ApplicationController@linkVersion', 'as' => 'application.plugin.linkversion']);
    Route::post('/application/{appid/link/{pluginid}', ['before' => 'csrf', 'uses' => 'ApplicationController@storeLink', 'as' => 'application.plugin.storeLink']);
});

Route::get('/api/{id}/css', ['uses' => 'APIController@css', 'as' => 'api.css']);
Route::get('/api/{id}/js', ['uses' => 'APIController@js', 'as' => 'api.js']);

Route::post('iron/receive', function()
{
    return Queue::marshal();
});

Route::get('/test', function()
{
    Pusherer::trigger('stream', 'stream', [
        'msg' => 'YOLO'
    ]);
});