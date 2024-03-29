<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- JS SCRIPTS -->
    <script type="text/javascript" src="{{asset("js/jquery-3.6.0.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/fontawesome.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/sb-admin-2.min.js")}}"></script>

    <!-- CSS STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/fontawesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/sb-admin-2.min.css")}}">
    <title>@yield('title')</title>
    <style>

       html, body{ font-family: 'Poppins', sans-serif !important;}
    </style>
</head>

<body class="bg-gradient-light">

    @include("inc.header")

    @yield('content')

    @include("inc.footer")

    <!-- CUSTOM JS SCRIPTS -->

    <script type="text/javascript" src="{{asset("js/guest.js")}}"></script>
</body>

</html>
