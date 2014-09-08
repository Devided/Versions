@extends('layouts.default')

@section('title', HTML::linkAction('PluginController@index','Plugins') . ' > ' . $plugin->name . '')

@section('page')

<div class="row">
    <div class="col-md-12">
        @include('admin.partials._errors')
        @include('admin.partials._success')


        <div class="col-md-6">
            <form id="form2" class="form-horizontal form-bordered">
                <section class="panel">
                    <header class="panel-heading">

                        <h2 class="panel-title">Versions</h2>

                        <p class="panel-subtitle">
                            An overview of all applications using this plugin
                        </p>
                    </header>
                    <div class="panel-body">
                        test
                    </div>
                </section>
            </form>
        </div>
        <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="{{ action('plugin.edit', $plugin->id) }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a>
                        </div>

                        <h2 class="panel-title">Plugin details</h2>

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
@stop