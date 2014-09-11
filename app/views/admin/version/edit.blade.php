@extends('layouts.default')

@section('title', HTML::linkAction('PluginController@index','Plugins') . ' > ' . HTML::linkAction('PluginController@show',$plugin->name,[$plugin->id]) . ' > ' . $version->name . ' > edit version')

@section('page')
{{ Form::model($version, ['route' => ['plugin.version.update', $plugin->id, $version->id], 'method' => 'PUT']) }}
@include('admin.partials._errors')
<div class="col-lg-6">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">JS</h2>

            <p class="panel-subtitle">
                Paste all javascripts for the plugin below.
            </p>
        </header>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    {{ Form::textarea('js', null, ['class' => 'form-control','rows' => '10', 'style' => 'height: 200px;']) }}
                </div>
            </div>
        </div>
    </section>
</div>
<div class="col-lg-6">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">CSS</h2>

            <p class="panel-subtitle">
                Paste all css for the plugin below.
            </p>
        </header>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    {{ Form::textarea('css', null, ['class' => 'form-control','rows' => '10', 'style' => 'height: 200px;']) }}
                </div>
            </div>
        </div>
    </section>
</div>
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Details</h2>

            <p class="panel-subtitle">
                Enter the name and risk rating below.
            </p>
        </header>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="inputSuccess">Version name</label>
                <div class="col-md-6">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'e.g. 1.1.4']) }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="inputSuccess">Risk rating</label>
                <div class="col-md-6">
                    <select class="form-control mb-md" name="risk">
                        <option value="0">(0) - Ok</option>
                        <option value="1">(1) - Low</option>
                        <option value="2">(2) - Medium</option>
                        <option value="3">(3) - High</option>
                    </select>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    {{ Form::submit('Save',['class' => 'btn btn-success pull-right']) }}
                </div>
            </div>
        </footer>
    </section>
</div>
{{ Form::close() }}
@stop