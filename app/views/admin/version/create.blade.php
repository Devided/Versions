@extends('layouts.default')

@section('title', HTML::linkAction('PluginController@index','Plugins') . ' > ' . HTML::linkAction('PluginController@show',$plugin->name,[$plugin->id]) . ' > new version')

@section('page')
<p>test</p>
@stop