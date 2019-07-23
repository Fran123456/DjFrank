@extends('layouts.auth')

@section('content')
    <body class="login-page">
        <div class="login-box">
        <div class="logo text-center">
            <img height="100" width="100" class="text-center" src="images/icon.png">
        </div>
        <div class="card">

            @if(session('message'))
            <script type="text/javascript">
                showNotification("bg-blue-grey", "{{ __('sessionFailed') }}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
            @endif

             @if(session('message2'))
            <script type="text/javascript">
                showNotification("alert-danger", "{{Session('message2')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
            @endif

            

            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                	@csrf
                    <div class="msg">{{__('titlelogin')}}</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('email') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('password') }}" required>
                        </div>
                           @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
                            <label for="remember">{{ __('rememberMe') }}</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">{{ __('login') }}</button>
                        </div>
                    </div><hr>
                    <div class="row">
                        
                        <div class="msg">{{__('Accede con Facebook')}}</div>
                        <a class="btn btn-block btn-lg bg-facebook waves-effect default" href="{{ route('social_auth' , ['driver' => 'facebook']) }}"><i class="fab fa-facebook-square fa-2x"></i></a>
                    </div><br>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a style="    color: #4172A9;" href="{{ route('register') }}">{{ __('registerNow') }}</a>
                        </div>
                        <div class="col-xs-6 align-right">
                        	@if (Route::has('password.request'))
                            <a style="    color: #4172A9;" href="{{ route('password.request') }}">{{ __('forgotPassword') }}</a>
                            @endif 
                        </div>
                      <!--    <a class="aLanguage" style="color:black" href="{{-- route('set_Language',['es']) --}}">Spanish</a>
                           <a class="aLanguage" style="color:black" href="{{-- route('set_Language',['en']) --}}">English</a>-->
                    </div>
                </form>
            </div>
        </div>
      
            {{--@include('partials.auth.social_login')--}}

        
        
    </div>
</body>
@endsection
