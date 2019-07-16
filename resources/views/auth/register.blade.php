@extends('layouts.auth')

@section('content')
<body class="signup-page">
     <div class="signup-box">
        <div class="logo text-center">
             <img height="100" width="100" class="text-center" src="images/icon.png">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="msg">{{ __('titleRegister') }}</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="name" type="text" placeholder="{{ __('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" placeholder="{{ __('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                            <input id="password" type="password" minlength="6" placeholder="{{ __('password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>

                        @error('password')
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
                            <input  type="password" minlength="6" placeholder="{{ __('confirmPassword') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">{{ __('signUp') }}</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route('login') }}">{{ __('You already have a membership?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
  
@endsection
