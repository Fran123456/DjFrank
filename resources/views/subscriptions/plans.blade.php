@extends('layouts.app')
@section('content')
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
    <h1 class="display-4 displayJumbo" style="color: #EDEAEA">SUSCRIBETE</h1>
    <p class="lead paragraphJumbo" > Y ccede ya! a cualquier curso.</p>
  </div>
</div>

<div class="row" >
	       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey text-center">
                            <h2>
                                MENSUAL <small>$9.99 / Mes</small>
                            </h2>
                        </div>
                        <div class="body text-center" >

                           	<h5>Acceso a todos los cursos</h5>
                           	<hr>
                           	<h5>Acceso a todos los materiales</h5>
                           	<hr>
                           	<div id="app">
                           	@include('partials.subscriptions.form', [
                            "product" => [
                                "name" => __("Suscripción"),
                                "description" => __("Mensual"),
                                "type" => "monthly",
                                "amount" => 999,99
                            ]
                          ])
                          </div>
                        </div>

                        
                    </div>
                </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
  