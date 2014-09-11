@extends('layouts.default')

@section('title', HTML::linkAction('ApplicationController@index','Applications') . ' > ' . HTML::linkAction('ApplicationController@show',$app->name,[$app->id]) . ' > select plugin')

@section('page')
<div class="col-md-12">
    @include('admin.partials._errors')

    {{ Form::open(['route' => ['application.plugin.storePlugin', $app->id]]) }}
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Select plugin</h2>
                <p class="panel-subtitle">
                    Select the plugin that needs to be connected to the application.
                </p>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Plugin</label>
                    <div class="col-sm-9">
                        {{ Form::select('plugin', $pluginlist, null, ['class' => 'form-control']) }}
                        <label class="error" for="company"></label>
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        {{ Form::submit('Next',['class' => 'btn btn-success pull-right']) }}
                    </div>
                </div>
            </footer>
        </section>
    {{ Form::close() }}
</div>
@stop