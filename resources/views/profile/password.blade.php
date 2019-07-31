@extends('layouts.app')

@section('content')


 @if(session('message'))
            <script type="text/javascript">
                showNotification("{{Session('message')[1]}}", "{{Session('message')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
  @endif


          <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Cambia contraseña</h2>
                        </div>
                        <div class="body">
                                          <form class="form-horizontal" method="POST" action="{{ route('profile.changePassword') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Nueva contraseña</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Nueva contraseña" required="">
                                                    </div>

                                                     @if ($errors->has('password'))
				                                        <span class="invalid-feedback">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
				                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nueva contraseña (Confirmar)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirma la contraseña"  required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">Cambiar</button>
                                                </div>
                                            </div>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>














@endsection
  