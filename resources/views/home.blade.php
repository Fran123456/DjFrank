@extends('layouts.app')

@section('content')
{{-- \App\User::navigation() --}}

<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

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
	    background-image: url('../images/backHome.png');
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
	    background-image: url('../images/backHome.png');
	}
</style>
@endguest

<div class="jumbotron ">
  <div class="">
    <h1 class="display-4 displayJumbo" style="color: #EDEAEA">Todos los cursos</h1>
    <p class="lead paragraphJumbo" >Accede ya! a cualquier curso.</p>
  </div>
</div>





<!--COURSES -->
@include('partials.home/courses');
<!--COURSES -->

@endsection
  