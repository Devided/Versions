@extends('layouts.default')

@section('title', 'Application overview')

@section('page')

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Applications</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)

                                <tr>
                                    <td>{{ $app->id }}</td>
                                    <td>{{ $app->name }}</td>
                                    <td>{{ $app->url }}</td>
                                    @if($app->active)
                                        <td><span class="text-success">Active</span></td>
                                    @else
                                        <td><span class="text-danger">Inactive</span></td>
                                    @endif
                                    <td class="actions">
                                        <a href=""><i class="fa fa-pencil"></i></a>
                                        <a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@stop