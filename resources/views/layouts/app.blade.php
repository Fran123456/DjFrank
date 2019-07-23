<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   
     <link href="{{ asset('css/waves.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/all-themes.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
     <!--CUSTOM CSS-->
     <link href="{{ asset('css/default.css') }}" rel="stylesheet">
 
    <!-- Bootstrap Core Css -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

     <!-- composition scripts -->
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/waves.min.js') }}"></script>
     <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>

    <style type="text/css">
        .sidebar .user-info {
            padding: 13px 15px 12px 15px;
            white-space: nowrap;
            position: relative;
            border-bottom: 1px solid #e9e9e9;
            background: url(../images/backlogin2.jpg) no-repeat no-repeat;
            height: 135px;
        }

        
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>

</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    @include('partials.layout.loader')
    <!-- Page Loader -->
   
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    @include('partials.layout.nav')
    <!-- Top Bar -->
    
    <section>
        <!-- Left Sidebar -->
        @auth
           @include('partials.layout.leftSidebar')
        @endauth
        {{--@include('partials.layout.leftSidebar')--}}
        
        <!-- Left Sidebar -->
        <!-- Right Sidebar -->
        @include('partials.layout.rightSidebar')
        <!-- Right Sidebar -->
    </section>

    <section class="content">
        @auth
        <div class="container-fluid">
              @yield('content')
        </div>
        @endauth
    </section>
    <section class="guest">
        @guest
              @yield('content')
        @endguest
    </section>

   
</body>

</html>
