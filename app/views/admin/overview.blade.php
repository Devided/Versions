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
                            <i class="fa fa-life-ring"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Support Questions</h4>
                            <div class="info">
                                <strong class="amount">1281</strong>
                                <span class="text-primary">(14 unread)</span>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase">(view all)</a>
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
                            <i class="fa fa-usd"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Total Profit</h4>
                            <div class="info">
                                <strong class="amount">$ 14,890.30</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase">(withdraw)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop