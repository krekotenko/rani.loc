<!DOCTYPE html>
<html>
<head>

    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!--Styles-->
    <link href="{{ asset('css/hamburgers.min.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/nice-select.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/selectize.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/datepicker/datepicker.min.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/fullcalendar.min.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/slick/slick.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/slick/slick-theme.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/audio-player.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="{{ asset('css/media.css') }}" type="text/css" rel="stylesheet" media="screen, projection"/>
</head>
<body>
<!--Header -->
<header class="main-header absolute-header js-header  animated @if(PageCheckService::isPage('contact')) header-contact @endif @if(PageCheckService::checkRouteName('public-programs') || PageCheckService::isPage('giving-back') || PageCheckService::checkRouteName('public-blog') || PageCheckService::checkRouteName('public-blog-show')|| PageCheckService::checkRouteName('public-client-stories-page')) header-white-text @endif">
    @include('public::layouts.parts.header')
</header>
    @yield('content')
<!--Footer -->
<footer class="main-footer">
    @include('public::layouts.parts.footer')
</footer>
<div class="hidden" style="display: none;">
    @include('public::layouts.parts.hidden')
</div>
<!--Scripts-->
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>