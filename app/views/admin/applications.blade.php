@extends('layouts.default')

@section('title', 'Applications')

@section('page')

<div class="row">
    <div class="col-md-12">

        @include('admin.partials._errors')
        @include('admin.partials._success')

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</button>
                </div>
                <h2 class="panel-title">Applications</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)

                                <tr>
                                    <td>{{{ $app->name }}}</td>
                                    <td>{{ HTML::link($app->url,null,['target' => '_blank']) }}</td>
                                    <td>
                                    {{ Form::open(['method' => 'PATCH', 'action' => ['applications.switch', $app->id], 'id' => 'switch'.$app->id]) }}
                                        <a href="#" onclick="$('#switch{{$app->id}}').submit()">
                                    @if($app->active)
                                        <span class="text-succes"><i class="fa fa-circle"></i> Active</span>
                                    @else
<<<<<<< HEAD
                                        <span class="text-danger">Inactive</span>
=======
                                        <td><span class="text-danger"><i class="fa fa-circle"></i> Inactive</span></td>
>>>>>>> 3c404436e81b7c2fa5b6fd448f019a642acfc2b2
                                    @endif
                                        </a>
                                        {{ Form::close() }}
                                    </td>
                                    <td class="actions">
                                        <a href=""><span class="text-warning"><i class="fa fa-pencil"></i></span></a>
                                        <a href="#modalDelete" onclick="setupDeleteModal('{{{ $app->name }}}', '{{{ action('applications.index') }}}/{{ $app->id }}')" class="delete-row modal-delete"><span class="text-danger"><i class="fa fa-trash-o"></i></span></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $applications->links() }}
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
                    {{ Form::open(['method' => 'DELETE', 'action' => ['applications.destroy', NULL], 'id' => 'deleteForm']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success modal-confirm']) }}
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    {{ Form::close() }}
                </div>
            </div>
        </footer>
    </section>
</div>

@stop