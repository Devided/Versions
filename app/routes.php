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

    Route::resource('/applications', 'ApplicationController');
    Route::post('/applications', ['as' => 'applications.store', 'uses' => 'ApplicationController@store', 'before' => 'csrf']);
    Route::patch('/applications/{id}', ['uses' => 'ApplicationController@update', 'as' => 'applications.update', 'before' => 'csrf'] );
    Route::patch('/applications/switch/{id}', ['uses' => 'ApplicationController@status', 'as' => 'applications.switch', 'before' => 'csrf'] );
    Route::resource('/plugin', 'PluginController');
    Route::get('/settings', ['uses' => 'SettingController@index','as' => 'admin.settings']);
    Route::put('/settings', ['uses' => 'SettingController@update','as' => 'admin.settings', 'before' => 'csrf']);
    Route::get('/logout', ['uses' => 'SessionsController@destroy','as' => 'admin.logout']);
});

Route::get('/api/{id}/js', ['uses' => 'APIController@js', 'as' => 'api.js']);
Route::get('/api/{id}/css', ['uses' => 'APIController@css', 'as' => 'api.css']);

//temp
Route::get('/create', function(){
    $app = new Application;
    $app->name = 'testApp';
    $app->url = 'http://google.com';
    $app->active = true;

    if($app->save())
        return 'ok';
});