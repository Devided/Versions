@extends('layouts.default')

@section('title', 'Overview')

@section('page')
<div class="row">

    <div class="col-md-12 col-lg-6 col-xl-6">
        <section class="panel panel-featured-left panel-featured-primary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
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
        <section class="panel panel-featured-left panel-featured-secondary">
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
                                <ul id="activity_stream" class="activity-stream"></ul>
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
@stop