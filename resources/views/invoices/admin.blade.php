@extends('layouts.app')
@section('content')
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
        background-image: url('../images/backHome.png');
    }
</style>
 @if(session('message'))
            <script type="text/javascript">
                showNotification("{{Session('message')[1]}}", "{{Session('message')[0]}}", "top", "center", "animated bounceIn", "animated bounceOut");
            </script>
  @endif
<div class="jumbotron ">
  <div class="">
    <h1 class="display-4 displayJumbo" style="color: #EDEAEA">Todos los cursos</h1>
    <p class="lead paragraphJumbo" >Accede ya! a cualquier curso.</p>
  </div>
</div>

    <div class="pl-5 pr-5">
        <div class="row justify-content-center">
            <table class="table table-hover table-dark table-bordered">
                <thead style="background-color: #515555; color: white">
                    <tr>
                        <th>{{ __("Fecha de la suscripción") }}</th>
                        <th>{{ __("Coste de la suscripción") }}</th>
                        <th>{{ __("Cupón") }}</th>
                        <th>{{ __("Descargar factura") }}</th>
                    </tr>
                </thead>
                <tbody style="background-color: white" >
                    @forelse($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->format('d/m/Y') }}</td>
                            <td>{{ $invoice->total() }}</td>
                            @if ($invoice->hasDiscount())
                                <td>
                                    {{ __("Cupón") }}: ({{ $invoice->coupon() }} / {{ $invoice->discount() }})
                                </td>
                            @else
                                <td>{{ __("No se ha utilizado ningún cupón") }}</td>
                            @endif
                            <td class="text-center">
                                <a style="color:white" class="btn btn-danger" href="{{ route('invoices.download', ['id' => $invoice->id]) }}">
                                    {{ __("Descargar") }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{ __("No hay ninguna factura disponible") }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection