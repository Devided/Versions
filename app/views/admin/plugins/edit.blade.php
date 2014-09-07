@extends('layouts.default')

@section('title', HTML::linkAction('PluginController@index','Plugins') . ' > ' . HTML::linkAction('PluginController@show',$plugin->name,[$plugin->id]) . ' > edit')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')

        <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Plugin details</h2>

                        <p class="panel-subtitle">
                            Use this form to edit a plugin in the version management system.
                        </p>
                    </header>
                    <div class="panel-body">
                        {{ Form::model($plugin, ['route' => ['plugin.update', $plugin->id] ]) }}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-md">
													<span class="input-group-addon">
														<i class="fa fa-globe"></i>
													</span>
                                    {{ Form::text($plugin->name, null, ['class' => 'form-control', 'placeholder' => 'e.g. Maximum EMG']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        {{ Form::button('Add', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    </footer>
                    {{ Form::close() }}
                </section>
        </div>
    </div>
</div>
@stop