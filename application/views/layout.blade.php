<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{base_url('assets/')}}css/bootstrap.min.css" rel="stylesheet">
    <link href="{{base_url('assets/')}}css/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{base_url('assets/')}}js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="{{base_url('assets/')}}js/popper.min.js"></script>
    <script type="text/javascript" src="{{base_url('assets/')}}js/bootstrap.min.js"></script>
    @yield('css')
    <link href="{{base_url('assets/')}}css/style.css" rel="stylesheet">
    <title>HB| @yield('title')</title>
</head>
<body>
<header>
    @component('component.navbar',$nav)@endcomponent
    @if ($notifikasi) @component('component.notifikasi',$notifikasi)@endcomponent @endif
</header>
<main id="app" class="">
    @yield('content')
</main>
@component('component.footer')@endcomponent
<script type="text/javascript" src="{{base_url('assets/')}}js/mdb.min.js"></script>
@yield('script')
</body>
</html>