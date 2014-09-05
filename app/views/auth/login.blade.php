@extends('layouts.login')
@section('page')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="{{ asset('assets/images/logo.png') }}" height="54" alt="CDN Control" />
        </a>
        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                {{ Form::open(['url' => 'login']) }}

                @include('admin.partials._errors')

                    <div class="form-group mb-lg">
                        <label>Username</label>
                        <div class="input-group input-group-icon">
                            {{ Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Gebruikersnaam']) }}
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                        </div>
                        <div class="input-group input-group-icon">
                            {{ Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Wachtwoord']) }}
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4 text-right">
                            {{ Form::button('Inloggen', ['class' => 'btn btn-primary hidden-xs', 'type' => 'submit']) }}
                            {{ Form::button('Inloggen', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg', 'type' => 'submit']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <p class="text-center text-muted mt-md mb-md">&copy; Copyright Maximum 2014. All Rights Reserved.</p>
    </div>
</section>
@stop