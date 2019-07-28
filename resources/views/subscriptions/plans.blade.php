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
	    background-image: url("../images/backPlans.jpg");
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
	    background-image: url('../images/backPlans.jpg');
	}
</style>
@endguest
 

          @if(session('message'))
            <script type="text/javascript">
                showNotification("{{Session('message')[1]}}", "{{Session('message')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
         @endif



<div class="jumbotron ">
  <div class="">
    <h1 class="display-4 displayJumbo" style="color: #EDEAEA">SUSCRIBETE</h1>
    <p class="lead paragraphJumbo" > Y ccede ya! a cualquier curso.</p>
  </div>
</div>

<div class="row" id="app" >
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
                           	<div >
                              @auth
                              	@if(!Auth::user()->subscribed('main'))
						          	@include('partials.subscriptions.form', [
			                            "product" => [
			                                "name" => __("Suscripción"),
			                                "description" => __("Mensual"),
			                                "type" => "montly",
			                                "plan" => "montly",
			                                "amount" => 999,99
			                            ]
			                          ])
			                     @endif
						      @endauth
                           
                          </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-green text-center">
                            <h2>
                                TRIMESTRAL <small>$17.99 / 3 mes</small>
                            </h2>
                        </div>
                        <div class="body text-center" >

                           	<h5>Acceso a todos los cursos</h5>
                           	<hr>
                           	<h5>Acceso a todos los materiales</h5>
                           	<hr>
                           	<div >
                           	@auth
                           	@if(!Auth::user()->subscribed('main'))
                           	@include('partials.subscriptions.form', [
                            "product" => [
                                "name" => __("Suscripción"),
                                "description" => __("Trimestral"),
                                "type" => "quarterly",
                                "plan" => "quarterly",
                                "amount" => 1799,99
                            ]
                          ])
                          @endif
                          @endauth
                          </div>
                        </div>
                    </div>
                </div>


                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-red text-center">
                            <h2>
                                ANUAL <small>$70.00 / 12 meses</small>
                            </h2>
                        </div>
                        <div class="body text-center" >

                           	<h5>Acceso a todos los cursos</h5>
                           	<hr>
                           	<h5>Acceso a todos los materiales</h5>
                           	<hr>
                           	<div >
                            @auth
	                            @if(!Auth::user()->subscribed('main'))
									@include('partials.subscriptions.form', [
		                            "product" => [
		                                "name" => __("Suscripción"),
		                                "description" => __("Anual"),
		                                "type" => "yearly",
		                                "plan" => "yearly",
		                                "amount" => 7000,00
		                            ]
		                          ])
	                           @endif
                           @endauth
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                @guest
                	<h4>Accede para poder adquirir un plan!!</h4>
                	<a style="color:white" class="btn btn-danger" href="{{ route('login') }}"> Accede </a>
                
                @endguest

                @auth
                   @if(Auth::user()->subscribed('main'))
                      <h4>usted ya posee un plan con nosotros!!</h4>
                      <h5>Ver suscripciones:</h5>
                      <a style="color:white" class="btn btn-danger" href="{{ route('subscriptions.admin') }}"> Ir </a>
                   @endif
                @endauth
                </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
  