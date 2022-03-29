<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <meta id="token" name="token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico.png') }}" sizes="16x16">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@yield('css')

</head>
<body class="epr @if(App::getLocale()==='ar') rtl @endif">
<div id="app">


    <div class="container">
        @yield('before-content')
        @include('flash::message')
    </div>
    @yield('content')
    @include('frontend.layouts.partials.footer')

</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('js')

</body>
</html>
