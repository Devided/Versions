@extends('layouts.default')

@section('title', 'Applications > ' . $app->name . '')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')

        <div class="col-md-12">
            <form id="form2" class="form-horizontal form-bordered">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Application details</h2>

                        <p class="panel-subtitle">
                            Use this form to edit an application in the version management system.
                        </p>
                    </header>
                    <div class="panel-body">
                        {{ Form::model($app, array('route' => 'applications.update', $app->id)) }}

                        @include('admin.partials._success')
                        @include('admin.partials._errors')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-md">
													<span class="input-group-addon">
														<i class="fa fa-globe"></i>
													</span>
                                    {{ Form::text($app->name, null, ['class' => 'form-control', 'placeholder' => 'e.g. Maximum EMG']) }}
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
                                    {{ Form::text($app->url,null,['class' => 'form-control', 'placeholder' => 'e.g. https://maximum.com']) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Active</label>
                            <div class="col-sm-10">
                                <div class="switch switch-sm switch-success">
                                    <div class="ios-switch on"><div class="on-background background-fill"></div><div class="state-background background-fill"></div><div class="handle"></div></div>
                                    {{ Form::text('active',null,['type' => 'checkbox','checked' => 'checked', 'style' => 'display:none;', 'data-plugin-ios-switch' => '']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        {{ Form::button('Add', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    </footer>
                    {{ Form::close() }}
                </section>
            </form>
        </div>
    </div>
</div>
@stop