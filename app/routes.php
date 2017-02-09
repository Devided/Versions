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

Route::get('/', function () {
    return Redirect::action('login');
});

Route::get('/login', [
    'uses'  => 'SessionsController@getLogin',
    'as'    => 'login',
]);
Route::post('/login', [
    'uses'   => 'SessionsController@postLogin',
    'as'     => 'login',
    'before' => 'csrf',
]);

Route::group(['before' => 'auth'], function () {
    Route::get('/', function () {
        return Redirect::to('/overview');
    });

    Route::get('/overview', [
        'uses'  => 'OverviewController@index',
        'as'    => 'dashboard',
    ]);

    //applications
    Route::resource('/application', 'ApplicationController');
    Route::post('/application', ['as' => 'applications.store', 'uses' => 'ApplicationController@store', 'before' => 'csrf']);
    Route::patch('/application/{id}', ['uses' => 'ApplicationController@update', 'as' => 'applications.update', 'before' => 'csrf']);

    //plugins
    Route::resource('/plugin', 'PluginController');

    //settings
    Route::get('/settings', ['uses' => 'SettingController@index', 'as' => 'admin.settings']);
    Route::put('/settings', ['uses' => 'SettingController@update', 'as' => 'admin.settings', 'before' => 'csrf']);

    //auth
    Route::get('/logout', ['uses' => 'SessionsController@destroy', 'as' => 'admin.logout']);

     //versions of plugins
    Route::get('/plugin/{pluginid}/version/create', ['uses' => 'VersionController@create', 'as' => 'plugin.version.create']);
    Route::get('/plugin/{pluginid}/version/{versionid}/edit', ['uses' => 'VersionController@edit', 'as' => 'plugin.version.edit']);
    Route::put('/plugin/{pluginid}/version/{versionid}', ['uses' => 'VersionController@update', 'as' => 'plugin.version.update', 'before' => 'csrf']);
    Route::post('/plugin/{pluginid}/version', ['uses' => 'VersionController@store', 'as' => 'plugin.version.store', 'before' => 'csrf']);
    Route::delete('/plugin/{pluginid}/version/{versionid}', ['uses' => 'VersionController@destroy', 'as' => 'plugin.version.destroy']);

    //link plugin to application (select plugin)
    Route::get('/application/{appid}/link', ['uses' => 'ApplicationController@link', 'as' => 'application.plugin.link']);
    Route::post('/application/{id}/link', ['before' => 'csrf', 'uses' => 'ApplicationController@storePlugin', 'as' => 'application.plugin.storePlugin']);

    //link plugin to application (select version)
    Route::get('/application/{appid}/link/{pluginid}', ['uses' => 'ApplicationController@linkVersion', 'as' => 'application.plugin.linkversion']);
    Route::post('/application/{appid}/link/{pluginid}', ['before' => 'csrf', 'uses' => 'ApplicationController@storeLink', 'as' => 'application.plugin.storeLink']);

    //link to delete plugin
    Route::delete('/application/{appid}/{versionid}', ['uses' => 'ApplicationController@deleteLink', 'as' => 'application.plugin.delete', 'before' => 'csrf']);
});

Route::get('/api/{id}/css', ['uses' => 'APIController@css', 'as' => 'api.css']);
Route::get('/api/{id}/js', ['uses' => 'APIController@js', 'as' => 'api.js']);
