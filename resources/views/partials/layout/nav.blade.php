<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/icon.png') }}" height="40" width="40"></a>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    @auth
                    <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">7</span>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li >
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    
                    @endauth
                    <!-- #END# Notifications -->

                    @guest
                    <li><a href="{{ route('login') }}"><i class="fas fa-2x fa-sign-in-alt"></i></a></li>

                    @endguest


                     <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="fas fa-2x fa-language"></i>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="header">LANGUAGES</li>
                            <li class="body">
                                <ul class="">
                                    <li class="liLanguage">
                                        <a class="aLanguage" href="{{ route('set_Language',['es']) }}">Spanish</a>
                                    </li>
                                     <li class="liLanguage">
                                        <a class="aLanguage" href="{{ route('set_Language',['en']) }}">English</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                   

                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                        <i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->