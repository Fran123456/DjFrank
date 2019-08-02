@extends('layouts.app')

@section('content')

<div class="row">
	<br>
	<div class="col-md-10 col-xs-12 col-sm-12">
		<div class="embed-responsive embed-responsive-16by9">
		     {!!$episode->video!!}
		</div>
	</div>
	<div class="col-md-10 text-center ">
		<div class="video-p-10" style="padding-top:10px; padding-bottom:10px;">
			@if ($help[1] != null)
				<a style="color:white" href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$help[1]->slug] ) }}" class="btn btn-info "><i class="fas fa-backward fa-2x"></i></a>
			@endif

			@if ($help[0] != null)
				<a style="color:white" href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$help[0]->slug] ) }}" class="btn btn-info "><i class="fas fa-forward fa-2x"></i></a>
			@endif


		</div>

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
