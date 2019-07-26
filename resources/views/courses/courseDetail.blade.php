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
					<a style="color:white; margin-top: 5px" href="{{ route('plans') }}" class="btn bg-indigo">Subscribirme</a>
           		@else
                   <!-- No se puede subscribir porque ya es usuario del grupo-->
                   @can('inscribe', $course)
                     <a style="color:white; margin-top: 5px" href="" class="btn btn-success">Inscribirme</a>
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

 <!--GOALS-->
 @include('partials.courses.goalsAndRequirements')
 <!--GOALS-->
 <!--DESCRIPTIONS AND USERS-->
  @include('partials.courses.descriptionAndUsers')
 <!--DESCRIPTIONS AND USERS-->

  
<!--EPISODE-->
  @include('partials.courses.episode')
 <!--EPISODE-->
@endsection
  