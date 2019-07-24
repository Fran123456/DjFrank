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
                        <b>Profile Content</b>             
                  </div>
           </div>

  <!--DESCRIPTION-->

  <!--SECTIONS END EPISODES-->           
                @forelse($course->sections as $go)
                   <li class="list-group-item active">{{$go->id}}</li>

  
		                @forelse($go->episodes as $a)
		                   <li class="list-group-item">{{$a->id }} - {{$a->title}}</li>
		                @empty
		                   <li class="list-group-item">No hay metas para este curso</li>
		                @endforelse
  


                @empty
                   <li class="list-group-item">No hay metas para este curso</li>
                @endforelse
  <!--SECTIONS END EPISODES-->


@endsection
  