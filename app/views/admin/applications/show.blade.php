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
                            <a href="{{ action('application.plugin.link', [$app->id]) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-link"></i> Connect</button></a>
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
                                    <td>{{ HTML::linkAction('PluginController@show', $connectedPlugin->plugin->name,[$connectedPlugin->plugin->id]) }}</td>
                                    <td>{{{ $connectedPlugin->name }}}</td>
                                    <td>@include('admin.partials._thread', ['thread' => $connectedPlugin->thread()])</td>
                                    <td><a href="#modalDelete" onclick="setupDeleteModal('{{{ $connectedPlugin->plugin->name . ' ' . $connectedPlugin->name }}}', '{{{ action('application.index') }}}/{{ $app->id }}/{{ $connectedPlugin->id }}')" class="delete-row modal-delete"><span class="text-danger"><i class="fa fa-trash-o"></i></span></a></td>
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
                                    @include('admin.partials._thread', ['thread' => $risk])
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
                                &lt;link rel="stylesheet" type="text/css" href="{{ action('api.css',[($app->id)]) }}"&gt;
                            </code>
                        </p>
                        <p>Javascript<br />
                            <code>
                                &lt;script src="{{ action('api.js',[($app->id)]) }}"&gt;
                            </code>
                        </p>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<div id="modalDelete" class="zoom-anim-dialog modal-block modal-full-color modal-block-danger mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Are you sure?</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-icon">
                    <i class="fa fa-question-circle"></i>
                </div>
                <div class="modal-text">
                    <p>Are you sure that you want to delete <b><span id="modalDeleteName">null</span></b> from this application?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    {{ Form::open(['method' => 'DELETE', 'action' => ['application.plugin.delete', NULL], 'id' => 'deleteForm']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-success modal-confirm']) }}
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>
        </footer>
    </section>
</div>
@stop