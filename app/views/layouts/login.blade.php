<!doctype html>
<html class="fixed">
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
@yield('page')

{{ HTML::script('assets/vendor/jquery/jquery.js') }}
{{ HTML::script('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}
{{ HTML::script('assets/vendor/bootstrap/js/bootstrap.js') }}
{{ HTML::script('assets/vendor/magnific-popup/magnific-popup.js') }}
{{ HTML::script('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}
{{ HTML::script('assets/javascripts/theme.js') }}
{{ HTML::script('assets/javascripts/theme.custom.js') }}
{{ HTML::script('assets/javascripts/theme.init.js') }}
</body>
</html>