@extends('layouts.default')

@section('title', 'Plugins')

@section('page')

<div class="row">
    <div class="col-md-12">

        @include('admin.partials._errors')
        @include('admin.partials._success')

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="{{ action('plugin.create') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</button></a>
                </div>
                <h2 class="panel-title">Plugins</h2>

                <p class="panel-subtitle">
                    An overview of all the plugins available to be included in the applications.
                </p>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Documentation</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plugins as $plugin)

                        <tr>
                            <td>{{ HTML::linkAction('PluginController@show',$plugin->name,[$plugin->id]) }}</td>
                            <td>{{ HTML::link($plugin->docurl, null, ['target' => '_blank']) }}</td>
                            <td class="actions">
                                {{ HTML::decode(HTML::linkAction('PluginController@show', '<span class="text-warning"><i class="fa fa-pencil"></i></span>', [$plugin->id])) }}
                                <a href="#modalDelete" onclick="setupDeleteModal('{{{ $plugin->name }}}', '{{{ action('plugin.index') }}}/{{ $plugin->id }}')" class="delete-row modal-delete"><span class="text-danger"><i class="fa fa-trash-o"></i></span></a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pull-right">
                {{ $plugins->links() }}
            </div>
        </section>
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
                    <p>Are you sure that you want to delete: <b><span id="modalDeleteName">null</span></b>?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    {{ Form::open(['method' => 'DELETE', 'action' => ['plugin.destroy', NULL], 'id' => 'deleteForm']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-success modal-confirm']) }}
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>
        </footer>
    </section>
</div>

@stop