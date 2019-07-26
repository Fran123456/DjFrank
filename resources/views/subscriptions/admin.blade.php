@extends('layouts.app')

@section('content')
{{-- \App\User::navigation() --}}

<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">


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
	    background-image: url('../images/suscriptions.jpg');
	}
</style>



 
  @if(session('success'))
            <script type="text/javascript">
                showNotification("{{Session('success')[1]}}", "{{Session('success')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
  @endif


  @if(session('action'))
            <script type="text/javascript">
                showNotification("{{Session('action')[1]}}", "{{Session('action')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
  @endif
 
<div class="jumbotron ">
  <div class="">
    <h1 class="display-4 displayJumbo" style="color: #EDEAEA">Mis suscripciones</h1>
    <p class="lead paragraphJumbo" >Cancela o reanuda tu suscripciones cuando quieras.</p>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
                 <thead style="background-color: #515555; color: white">
                       <tr>
	                        <th scope="col">#</th>
	                      <!--   <th scope="col">Nombre</th>-->
	                        <th scope="col">Plan</th>
	                     <!--   <th scope="col">ID Suscripción</th>-->
	                        <th scope="col">Cantidad</th>
	                      <th scope="col">Alta</th>
	                        <th scope="col">Finaliza en</th>
	                        <th scope="col">Cancelar / Reanudar</th>
                      </tr>
                  </thead>
                 <tbody style="background-color: white"  >
                     @forelse($subscriptions as $key => $subscription)
                        <td>{{ $key+1 }}</td>
                       <!--  <td>{{ $subscription->name }}</td>-->
                        <td>{{ $subscription->stripe_plan }}</td>
                       <!--  <td>{{ $subscription->stripe_id }}</td>-->
                        <td>{{ $subscription->quantity }}</td>
                        <td>{{ $subscription->created_at->format('d/m/Y') }}</td>
                        <td>{{ $subscription->ends_at ? $subscription->ends_at->format('d/m/Y') : __("Suscripción activa") }}</td>
                        <td class="text-center">
                            @if($subscription->ends_at)
                                <form action="{{route('subscriptions.resume')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $subscription->name }}" />
                                    <button class="btn btn-success">
                                        {{ __("Reanudar") }}
                                    </button>
                                </form>
                            @else
                                <form action="{{route('subscriptions.cancel')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $subscription->name }}" />
                                    <button class="btn btn-danger">
                                        {{ __("Cancelar") }}
                                    </button>
                                </form>
                            @endif
                        </td>
                    @empty
                        <tr>
                            <td colspan="8">{{ __("No hay ninguna suscripción disponible") }}</td>
                        </tr>
                    @endforelse
                 </tbody>
         </table>
	</div>
</div>

@endsection
  