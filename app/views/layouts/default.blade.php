<!doctype html>
<html class="boxed">
<head>
    <meta charset="UTF-8">
    <title>Versions | Maximum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    {{ HTML::style('assets/vendor/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/vendor/font-awesome/css/font-awesome.css') }}
    {{ HTML::style('assets/vendor/magnific-popup/magnific-popup.css') }}
    {{ HTML::style('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}
    {{ HTML::style('assets/stylesheets/theme.css') }}
    {{ HTML::style('assets/stylesheets/skins/default.css') }}
    {{ HTML::style('assets/stylesheets/theme-custom.css') }}

    {{ HTML::script('assets/vendor/modernizr/modernizr.js') }}
</head>
<body>
<section class="body">
    @include('admin.partials._header')
    <div class="inner-wrapper">
        @include('admin.partials._sidebar')
        <section role="main" class="content-body">
            <header class="page-header">
            <h2>@yield('title')</h2>
        </header>
        @yield('page')
        </section>
       </div>
</section>

{{ HTML::script('assets/vendor/jquery/jquery.js') }}
{{ HTML::script('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}
{{ HTML::script('assets/vendor/bootstrap/js/bootstrap.js') }}
{{ HTML::script('assets/vendor/magnific-popup/magnific-popup.js') }}
{{ HTML::script('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}
{{ HTML::script('assets/vendor/ios7-switch/ios7-switch.js') }}
{{ HTML::script('assets/vendor/jquery-autosize/jquery.autosize.js') }}
{{ HTML::script('assets/javascripts/theme.js') }}
{{ HTML::script('assets/javascripts/theme.custom.js') }}
{{ HTML::script('assets/javascripts/theme.init.js') }}
{{ HTML::script('http://js.pusher.com/2.2/pusher.min.js') }}
{{ HTML::script('assets/javascripts/PusherActivityStreamer.js') }}

<script type="text/javascript">
    $(function() {
        var pusher = new Pusher('5218c7c448c691ad64bf');
        var channel = pusher.subscribe('stream');
        var streamer = new PusherActivityStreamer(channel, '#activity_stream');
    });
</script>
</body>
</html>