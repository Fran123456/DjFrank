@extends('layouts.app')
@section('content')
{{-- \App\User::navigation() --}}
@auth
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
	    background-image: url('../images/detail.jpg');
	}
</style>
@endauth
@guest
<style type="text/css">
	.jumbotron {
	    padding-top: 15px;
	    padding-bottom: 30px;
	    padding-left: 40px;
	    margin-top: -35px;
	    margin-bottom: 30px;
	    margin-left: -100px;
	    margin-right: -100px;
	    color: inherit;
	    /*background-color: #e0d5d5;*/
	    background-image: url('../images/detail.jpg');
	}
</style>
@endguest

<div class="jumbotron ">
  <div class="row">
  	<div class="col-md-6 col-sm-4 col-4 text-right">
      <img height="300" width="500" class="imgDetail img-thumbnail" src="{{$course->pathAttachment()}}">
  	</div>
  	<div class="col-md-6 col-sm-8 col-8 text-left">
       <h3 class="display-4 displayJumbo" style="color: #EDEAEA">{{$course->name}}</h3>
       <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Profesor/a: {{$course->administrator->user->name}}</h4>
       <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Categoría: {{$course->category->name}}</h4>
        <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Fecha publicación: {{$course->created_at->format('d/m/Y')}}</h4>
        <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Estudiantes inscritos: {{$course->students_count}}</h4>
        <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Valoraciones: {{$course->reviews_count}}</h4>
              <br>  
                <div class="text-left starts">
                    <i class="fas fa-star{{$course->rating >= 1 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 2 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 3 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 4 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 5 ? ' startColor' : ''}}"></i>
                </div>

         @auth
           @can('opt_for_course', $course)
           		@can('subscribe', \App\Course::class)
					<a href="" class="btn btn-success">Subscribirme</a>
           		@else
                   <!-- No se puede subscribir porque ya es usuario del grupo-->
                   @can('inscribe', $course)
                     <a href="" class="btn btn-success">Inscribirme</a>
                   @else
					 <a href="" class="btn btn-success">Inscrito</a>
                   @endcan
           		@endcan
           @else
           		<!--No puede porque usted es el admin-->
           		<h5 style="color: #EDEAEA">Usted es administrador/a del curso, no puede suscribirse.</h5>
           @endcan
         @else
           	<!--	No identificado (guest)-->
         @endauth




  	</div>
   <!-- <p class="lead paragraphJumbo">Accede ya! a cualquier curso.</p>-->
  </div>
</div>


  <div class="row">
   	<!--GOALS-->
   	<div class="col-md-6 col-sm-12 col-12">  
         <ul class="list-group">
                <li class="list-group-item list-group-item active">Metas</li>
                @forelse($course->goals as $goal)
                   <li class="list-group-item">{{$goal->goal}}</li>
                @empty
                   <li class="list-group-item">No hay metas para este curso</li>
                @endforelse
                
         </ul>             
   	</div>
    <!--GOALS-->
    <!--REQUIREMENTS-->
   	<div class="col-md-6 col-sm-12 col-12">  
         <ul class="list-group">
                <li class="list-group-item list-group-bg-teal">Requisitos</li>
                @forelse($course->requirements as $re)
                   <li class="list-group-item">{{$re->requirement}}</li>
                @empty
                   <li class="list-group-item">No hay requisitos para este curso</li>
                @endforelse
                
         </ul>             
   	</div>
   	<!--REQUIREMENTS-->
  </div>

  <!--DESCRIPTION AND MORE-->
        <!-- Nav tabs -->
       <ul class="nav nav-tabs" role="tablist" style="background-color: white">
             <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="true">
                                        <i class="material-icons">home</i> ¿QUE HAREMOS?
                                    </a>

             </li>
             <li role="presentation" class="">
                                    <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">face</i> ALUMNOS
                                    </a>
              </li>
              
        </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="background-color: white">
                 <div role="tabpanel" class="tab-pane fade active in " style="padding-left: 20px" id="home_with_icon_title">
                                    <b>¿Que vamo hacer?</b>
                                    <p>{{$course->description}}</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade " style="padding-left: 20px" id="profile_with_icon_title">
                        
            <!--LIST STUDENTS-->
                     <div class="bs-example" data-example-id="media-alignment">
                                @forelse($course->students as $student)
                                <div class="media">
                                    <div class="media-left media-bottom">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="/storage/users/{{$student->user->picture}}" width="50" height="50">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$student->user->name}}</h4>
                                        <p>
                                            {{$student->user->email}}
                                        </p>
                                       
                                    </div>
                                </div>
                                @empty
                                 No hay estudiantes inscritos en este curso
                                @endforelse
                            </div>
                 <!--LIST STUDENTS-->
                  </div>
           </div>

  <!--DESCRIPTION-->

  <!--SECTIONS END EPISODES-->     
  <br>      
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               SECCIONES DEL CURSO:
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                	@php
                                       $co = 1;
                                       $sec = 0;
                                    @endphp
                                	@forelse($course->sections as $key => $section)
                                    <div class="panel-group " id="accordion{{$key}}" role="tablist" aria-multiselectable="true">
                                        <div class="panel {{$colors[$sec]}}">
                                            <div class="panel-heading" role="tab" id="headingOne{{$key}}">
                                                <h4 class="panel-title" style="color: white">
                                                    <a style="color: white" role="button" data-toggle="collapse" href="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}" class="collapsed">
                                                       {{$key+1}} - {{$section->name}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne{{$key}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{$key}}" aria-expanded="false" style="height: 0px;">
                                               <div class="panel-body">
                                                 		<div class="list-group">
                                                 			
		                                                   @forelse($section->episodes as $n => $episode)
							                                <a href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$episode->slug] ) }}" class="list-group-item ">
							                                   {{$co+$n}} - {{$episode->title}}
							                                </a>
							                                @empty
							                                 No hay capítulos para esta sección
							                                @endforelse
							                            </div>
							                            @php
							                            	$co = $co+$n+1;
							                            @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    if($key == 0){
                                        $sec++;
                                    }else{
                                       if($key%6 ==0){
                                			$sec =0;
                                		}else{
                                			$sec++;
                                		}
                                    }
                                		
                                	@endphp
                                    @empty
					                   <li class="list-group-item">No hay secciones para este curso</li>
					                @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  <!--SECTIONS END EPISODES-->


@endsection
  