<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('feather.css/feather.css')}}">
    @yield('head')
</head>
<body>
    <div id="app">
    @guest()
        @yield("content")

        @else


        <main class="container-fluid ">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-12 col-lg-8 col-xl-10 vh-100 py-3 content">
                @include("layouts.head")
                <!--content Area Start-->
                @yield("content")
                <!--content Area Start-->
                </div>
            </div>

        </main>
        @endguest
    </div>
    <script src="{{asset('jquery/dish/jquery.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
   @yield("foot")
</body>
</html>
