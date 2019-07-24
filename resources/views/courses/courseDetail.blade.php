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
       <h4 class="display-4 displayJumbo" style="color: #EDEAEA">Profesor: {{}}</h4>
  	</div>
   <!-- <p class="lead paragraphJumbo">Accede ya! a cualquier curso.</p>-->
  </div>
</div>
@php
	print_r($course->administrator);
@endphp



@endsection
  