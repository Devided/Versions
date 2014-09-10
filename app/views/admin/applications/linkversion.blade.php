@extends('layouts.default')

@section('title', HTML::linkAction('ApplicationController@index','Applications') . ' > ' . HTML::linkAction('ApplicationController@show',$app->name,[$app->id]) . ' > select plugin')

@section('page')
<div class="col-md-12">
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
                    <select id="company" class="form-control" required="">
                        <option value="">Choose a Company</option>
                        <option value="apple">Apple</option>
                        <option value="google">Google</option>
                        <option value="microsoft">Microsoft</option>
                        <option value="yahoo">Yahoo</option>
                    </select>
                    <label class="error" for="company"></label>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-success pull-right">Finish</button>
                </div>
            </div>
        </footer>
    </section>
</div>
@stop