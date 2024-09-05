<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mom's Kitchen">
    <meta name="keywords" content="Mom's Kitchen">
    <meta name="author" content="Mom's Kitchen">
    <link rel="icon" href="{{asset('/images/logo/logomomg.png')}}" type="image/x-icon">

    <link rel="apple-touch-icon" href="{{asset('/images/logo/logomomg.png')}}">
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="moms kitchen">
    <meta name="msapplication-TileImage" content="{{asset('/images/logo/logomomg.png')}}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    
    @include('components.css')
</head>
<body>
    <div id="app">
        @include('components.guest-header')
        @yield('content')
        @include('components.theme-btn')
        @include('components.tap-to-top')
        @include('components.guest-footer')
    </div>

    @include('components.js')
    @stack('scripts')
</body>
</html>
