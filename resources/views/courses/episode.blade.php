@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-10 col-xs-12 col-sm-12">
		<div class="embed-responsive embed-responsive-16by9">
		     {!!$episode->video!!}
		</div>
	</div>
	<div class="col-md-2 col-xs-12 col-sm-12">

	</div>
	<div class="col-md-10">
		<div class="caja-sin-p10">
			<h3>{{strtoupper($episode->title)}}</h3>
		</div>
		<div class="caja">
			<img class="imgCircle" src="{{$course->administrator->user->pathAttachment()}}">
		 &nbsp;&nbsp;Publicado por <strong>{{$course->administrator->user->name}}</strong> el {{ $episode->created_at->format('d/m/Y') }}
		 <br><br>
		 {{$episode->description}}
		</div>
	</div>
</div>


@endsection
