@extends('layouts.default')

@section('title', HTML::linkAction('ApplicationController@index','Applications') . ' > ' . HTML::linkAction('ApplicationController@show',$app->name,[$app->id]) . ' > edit')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')

        <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Application details</h2>

                        <p class="panel-subtitle">
                            Use this form to edit an application in the version management system.
                        </p>
                    </header>
                    <div class="panel-body">
                        {{ Form::model($app, ['route' => ['application.update',$app->id], 'method' => 'PUT']) }}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-md">
													<span class="input-group-addon">
														<i class="fa fa-globe"></i>
													</span>
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'e.g. Maximum EMG']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-md">
													<span class="input-group-addon">
														<i class="fa fa-code"></i>
													</span>
                                    {{ Form::text('url',null,['class' => 'form-control', 'placeholder' => 'e.g. https://maximum.com']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        {{ Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    </footer>
                    {{ Form::close() }}
                </section>
        </div>
    </div>
</div>
@stop