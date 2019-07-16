<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   
   
     <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('css/all-themes.css') }}" rel="stylesheet">
     <link href="{{ asset('css/default.css') }}" rel="stylesheet">
     
     <!--CUSTOM CSS-->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
    <!-- Bootstrap Core Css -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

     <!-- composition scripts -->
    <script src="{{ asset('js/plugins.js') }}"></script>

    <style type="text/css">
        
            .login-page {
         
                background: url('images/backlogin2.jpg') no-repeat no-repeat;
                background-size: 1900px 1000px;
                padding-left: 0;
                max-width: 360px;
                margin: 5% auto;
                overflow-x: hidden;
            }
    </style>
    
</head>
<body class="login-page">
     @yield('content')
</body>
</html>
