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
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset("css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/fontawesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/sb-admin-2.min.css")}}">

    <title>@yield('title')</title>

</head>

<body id="page-top">

@include("editor.header")

    @yield('content')

<!-- Footer -->
@include('editor.footer')
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->


<!-- CUSTOM JS SCRIPTS -->

   <script defer type="text/javascript" src="{{asset("js/app.js")}}"></script>
   @stack("footerscripts")
</body>

</html>
