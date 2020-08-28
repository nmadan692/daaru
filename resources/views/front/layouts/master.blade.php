<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Daaruu Dot Com">
    <meta name="keywords" content="Daaruu, Drinks, Vodka, Beers">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="base-url" content="{{ url('') }}"/>
    <title>Daaruu Dot Com</title>
    <link rel="icon" type="image/png" href="{{asset('front')}}/img/icon.png"/>

    @include('front.layouts.header-links')
</head>


<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@include('front.layouts.header')


<div id="app">
    @yield('content')
</div>

@include('front.layouts.footer')

<!-- Js Plugins -->
@include('front.layouts.scriptfooter')



</body>

