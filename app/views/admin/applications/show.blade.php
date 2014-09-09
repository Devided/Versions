@extends('layouts.default')

@section('title', HTML::linkAction('ApplicationController@index','Applications') . ' > ' . $app->name . '')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')


        <div class="col-md-6">
            <form id="form2" class="form-horizontal form-bordered">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="{{ action('application.create') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</button></a>
                        </div>

                        <h2 class="panel-title">Connected plugins</h2>

                        <p class="panel-subtitle">
                            Use this form to edit an application in the version management system.
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Version</th>
                                    <th>Risk</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($connectedPlugins->isEmpty())
                                <td>
                                    <i>No plugins attached.</i>
                                </td>
                                @endif
                                @foreach($connectedPlugins as $connectedPlugin)

                                <tr>
                                    <td>{{{ $connectedPlugin->plugin->name }}}</td>
                                    <td>{{{ $connectedPlugin->name }}}</td>
                                    <td>@include('admin.partials._thread', ['thread' => $connectedPlugin->thread()])</td>
                                    <td></td>
                                </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {{ $connectedPlugins->links() }}
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <div class="col-md-6">
            <form id="form2" class="form-horizontal form-bordered">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="{{ action('application.edit',[$app->id]) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
                        </div>

                        <h2 class="panel-title">Application details</h2>

                        <p class="panel-subtitle">
                            Use this form to edit an application in the version management system.
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class=" col-md-3 control-label">Name</label>
                            <div class="col-lg-6">
                                <p class="form-control-static">{{{ $app->name }}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-md-3 control-label">Risk</label>
                            <div class="col-lg-6">
                                <p class="form-control-static">
                                    <span class="text-danger"><i class="fa fa-circle"></i> High</span>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" col-md-3 control-label">URL</label>
                            <div class="col-lg-6">
                                <p class="form-control-static">{{ HTML::link($app->url,null,['target' => '_blank']) }}</p>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <form id="form2" class="form-horizontal form-bordered">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Code snippet</h2>

                        <p class="panel-subtitle">
                            Use this code to include all the active plugins in the application.
                        </p>
                    </header>
                    <div class="panel-body">
                        <p>CSS<br />
                            <code>
                                &lt;link rel="stylesheet" type="text/css" href="{{ action('api.css',[($app->id * 50 + 4295)]) }}"&gt;
                            </code>
                        </p>
                        <p>Javascript<br />
                            <code>
                                &lt;script src="{{ action('api.js',[($app->id * 50 + 4295)]) }}"&gt;
                            </code>
                        </p>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>
@stop