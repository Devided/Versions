@extends('layouts.default')

@section('title', 'Overview')

@section('page')
<div class="row">
    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Total applications</h2>
                <p class="panel-subtitle">Total amount of applications in the version management.</p>
            </header>
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                            <i class="fa fa-hdd-o"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Applications</h4>
                            <div class="info">
                                <strong class="amount">{{ $totalapps }}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            {{ HTML::linkAction('ApplicationController@index','View all') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Total plugins</h2>
                <p class="panel-subtitle">Total amount of plugins in the version management.</p>
            </header>
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                            <i class="fa fa-cubes"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Plugins</h4>
                            <div class="info">
                                <strong class="amount">{{ $totalplugins }}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            {{ HTML::linkAction('PluginController@index','View all') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@if($overview->isEmpty())
<div class="alert alert-success">
    <strong>All applications are doing fine!</strong>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <section class="panel panel-danger">
            <header class="panel-heading">
                <h2 class="panel-title">High risk applications</h2>
                <p class="panel-subtitle">A list of applications that use high risk or medium risk rated plugins.</p>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Risk</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($overview as $app)
                        <tr>
                            <td>{{ HTML::linkAction('ApplicationController@show',$app->name,[$app->id]) }}</td>
                            <td>{{ HTML::link($app->url,null,['target' => '_blank']) }}</td>
                            <td>@include('admin.partials._thread',['thread' => Application::thread($app->risk)])</td>
                            <td class="actions">
                                {{ HTML::decode(HTML::linkAction('ApplicationController@edit', '<span class="text-warning"><i class="fa fa-pencil"></i></span>', [$app->id])) }}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pull-right">
                {{ $overview->links() }}
            </div>
        </section>
    </div>
</div>
@endif
@stop