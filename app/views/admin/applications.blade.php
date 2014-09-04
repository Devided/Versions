@extends('layouts.default')

@section('page')

    @foreach($applications as $app)
        {{ $app->name }}
        {{ $app->url }}
    @endforeach

@stop