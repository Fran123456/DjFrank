@extends('layouts.app')
@section('content')

<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<style type="text/css">

	.jumbotron {
	    padding-top: 15px;
	    padding-bottom: 30px;
	    padding-left: 40px;
	    margin-top: -35px;
	    margin-bottom: 30px;
	    margin-left: -45px;
	    margin-right: -100px;
	    color: inherit;
	    /*background-color: #e0d5d5;*/
	    background-image: url('../images/backHome.png');
	}
</style>


 
 @if(session('message'))
            <script type="text/javascript">
                showNotification("{{Session('message')[1]}}", "{{Session('message')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
  @endif

 
<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img class="imgCircleProfile" src="/storage/users/{{$user->picture}}">
                            </div>
                            <div class="content-area">
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->role->rol}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Cursos tomados</span>
                                    <span>{{$nCursos}}</span>
                                </li>
                                <li>
                                    <span>Plan</span>
                                   @if ($sub == null)
                                    	<span>No posee plan</span>
                                    @else
                                        @if($sub->ends_at == null)
                                           <span>Plan activo {{$sub->stripe_plan}}</span>
                                        @else
                                            <span>Plan finaliza: {{ $sub->ends_at->format('d/m/Y') }} </span>  
                                        @endif
                                    @endif
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>SOBRE MI</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Profesión:
                                    </div>
                                    <div class="content">
                                        {{$user->student->title}}
                                    </div>
                                </li>
                                @if($user->administrator != null)
                                <li>
                                    <div class="title">
                                        <i class="material-icons">shop</i>
                                        Biografía:
                                    </div>
                                    <div class="content">
                                        @if($user->administrator->biography ==null)
                                        No hay detalle de biografía
                                        @else
                                        {{$user->administrator->biography}}
                                        @endif
                                    </div>
                                </li>

                                <li>
                                    <div class="title">
                                        <i class="material-icons">desktop_windows</i>
                                        canal youtube:
                                    </div>
                                    <div class="content">
                                        @if($user->administrator->youtube_channel ==null)
                                        No hay detalle de canal
                                        @else
                                        {{$user->administrator->youtube_channel}}
                                        @endif
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Home</a></li>
                                    <li role="presentation" class=""><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Profile Settings</a></li>
                                    <li role="presentation" class=""><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="home">
                                        

                                       
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name Surname</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="text" class="form-control" id="NameSurname" name="NameSurname" placeholder="Name Surname" value="Marc K. Hammond" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line focused">
                                                        <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="example@example.com" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in">
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="change_password_settings">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
  