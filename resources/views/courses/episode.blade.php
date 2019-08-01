@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-10">
		<div class="embed-responsive embed-responsive-16by9">
		     {!!$episode->video!!}
		</div>
	</div>
	<div class="col-md-6">
		{{$episode->title}}
	</div>
</div>


@endsection
  