@extends('layouts.default')

@section('title', HTML::linkAction('ApplicationController@index','Applications') . ' > ' . HTML::linkAction('ApplicationController@show',$app->name,[$app->id]) . ' > ' . HTML::linkAction('ApplicationController@link', $plugin->name,[$app->id]) . ' > select version')

@section('page')
<div class="col-md-12">
    @include('admin.partials._errors')

    {{ Form::open(['route' => ['application.plugin.storeLink', $app->id, $plugin->id]]) }}
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Select version</h2>
            <p class="panel-subtitle">
                Select the version of the plugin that needs to be connected to the application.
            </p>
        </header>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">Plugin</label>
                <div class="col-sm-9">
                    <p class="form-control-static">
                        {{{ $plugin->name }}}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Version</label>
                <div class="col-sm-9">
                    {{ Form::select('version', $versionslist, null, ['class' => 'form-control']) }}
                    <label class="error" for="company"></label>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    {{ Form::submit('Connect',['class' => 'btn btn-success pull-right']) }}
                </div>
            </div>
        </footer>
    </section>
    {{ Form::close() }}
</div>
@stop