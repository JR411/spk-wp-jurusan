<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link rel="icon" href="/images/logo/logo_icon.png" type="image/png" />

    <title>Rekomendasi Jurusan Perguruan Tinggi - @yield('title')</title>

    <link href="/css/select2.min.css" rel="stylesheet" media="all">
    <link href="/css/bootstrap.min.css"rel="stylesheet"  media="all">
    <link href="/css/animate.css" rel="stylesheet" media="all">

    <link href="/css/main.css" rel="stylesheet" media="all">
</head>
<body>
    {{-- HEADER START --}}
    @include('layouts.header')
    {{-- HEADER END --}}

    {{-- CONTENT START --}}
    @yield('content')
    {{-- CONTENT END --}}

    {{-- FOOTER START --}}
    @include('layouts.footer')
    {{-- FOOTER END --}}

    @yield('modal')

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/animate.js"></script>
    <script src="/js/select2.min.js"></script>

    @yield('js')
</body>
</html>
