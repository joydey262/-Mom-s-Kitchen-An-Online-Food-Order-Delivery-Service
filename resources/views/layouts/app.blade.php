<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('/images/logo/logomomg.png')}}" type="image/x-icon">

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @include('components.css')
</head>
<body>
    <div id="app">
        @include('components.app-header')
        
        @include('components.theme-btn')
        @include('components.tap-to-top')

        <div class="shop-sidebar-demo">
            <a href="#!" class="sidebar-overlay" id="sidebar-overlay"></a>
            @include('components.sidebar')
            <div class="shop-body">
                @yield('content')
            </div>
        </div>

    </div>

    @include('components.js')
    @stack('scripts')
</body>
</html>
