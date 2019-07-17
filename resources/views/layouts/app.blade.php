<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
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
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

</head>

<body class="theme-red">
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
        @include('partials.layout.leftSidebar')
        <!-- Left Sidebar -->
        <!-- Right Sidebar -->
        @include('partials.layout.rightSidebar')
        <!-- Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>


                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
            </div>

           

           
        </div>
    </section>

   
</body>

</html>
