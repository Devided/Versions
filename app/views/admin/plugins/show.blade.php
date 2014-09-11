@extends('layouts.default')

@section('title', HTML::linkAction('PluginController@index','Plugins') . ' > ' . $plugin->name . '')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')


        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ action('plugin.version.create', $plugin->id) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</button></a>
                    </div>

                    <h2 class="panel-title">Versions</h2>

                    <p class="panel-subtitle">
                        An overview of all applications using this plugin
                    </p>
                </header>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>Version</th>
                                <th>Risk</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($versions as $version)

                            <tr>
                                <td>{{{ $version->name }}}</td>
                                <td>@include('admin.partials._thread',['thread' => $version->thread()])</td>
                                <td>
                                    {{ HTML::decode(HTML::linkAction('plugin.version.edit', '<span class="text-warning"><i class="fa fa-pencil"></i></span>', [$plugin->id, $version->id])) }}
                                    <a href="#modalDelete" onclick="setupDeleteModal('{{{ $version->name }}}', '{{{ action('plugin.version.destroy',[$plugin->id,$version->id]) }}}')" class="delete-row modal-delete"><span class="text-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-right">
                        {{ $versions->links() }}
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ action('plugin.edit', $plugin->id) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>
                    </div>

                    <h2 class="panel-title">Details</h2>

                    <p class="panel-subtitle">
                        An overview of this plugin's settings.
                    </p>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class=" col-md-5 control-label">Name</label>
                        <div class="col-lg-6">
                            {{{ $plugin->name }}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-md-5 control-label">Documentation</label>
                        <div class="col-lg-6">
                            {{ HTML::link($plugin->docurl, null, ['target' => '_blank']) }}
                        </div>
                    </div>
                </div>
            </section>
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
                    <p>Are you sure that you want to delete version <b><span id="modalDeleteName">null</span></b>?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    {{ Form::open(['method' => 'DELETE', 'action' => ['plugin.version.destroy', NULL], 'id' => 'deleteForm']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-success modal-confirm']) }}
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>
        </footer>
    </section>
</div>
@stop