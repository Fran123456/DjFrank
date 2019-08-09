@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('Facebook-Reactions/stylesheet.css')}} ">
<script type="text/javascript" src="{{asset('Facebook-Reactions/jquery-ui_1.12.1_.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Facebook-Reactions/facebook-reactions.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {

	$('.FB_reactions').facebookReactions({

	//	postUrl: "save.php"
		postUrl: "{{route('course.emoji')}}"
	});
});
</script>

<style media="screen">
.FB_reactions span {
	display: block;
	padding: 9px 9px 24px 30px;
	text-align: left;
}



</style>

<div class="row">

	 <!--VIDEO-->
		 <div class="col-md-12 ">
	 		<div class="embed-responsive embed-responsive-16by9">
					{!!$episode->video!!}
	 		</div>
	 	</div>
		 <!--VIDEO-->

      <!--TITLE Y DESCRIPTION -->
			 <div class="col-md-12">
		 		<div class="caja-sin-p10">
          <div class="text-center">
					  	<div class="video-p-10" style="padding-top:10px; padding-bottom:10px;">
						 @if ($help[1] != null)
							 <a style="color:white" href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$help[1]->slug] ) }}" class="btn btn-info "><i class="fas fa-backward fa-2x"></i></a>
						 @endif
						 <a style="width:55px" class="FB_reactions" data-reactions-type='horizontal' data-unique-id="1" data-emoji-class="">
									<span></span>
							</a>
						 @if ($help[0] != null)
							 <a style="color:white" href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$help[0]->slug] ) }}" class="btn btn-info "><i class="fas fa-forward fa-2x"></i></a>
						 @endif
					   </div>
          </div>


		 			<h3>{{strtoupper($episode->title)}}</h3>
		 		</div>
		 		<div class="caja">
		 			<img class="imgCircle" src="{{$course->administrator->user->pathAttachment()}}">
		 		 &nbsp;&nbsp;Publicado por <strong>{{$course->administrator->user->name}}</strong> el {{ $episode->created_at->format('d/m/Y') }}
		 		 <br><br>
		 		 {{$episode->description}}
				 @if($episode->material != null)
					 <br> <br> Descarga Material:
					 <a style="color: white" class="btn btn-success" href="{{$episode->material}}" target="_blank"><i class="fas fa-download"></i></a>
				@endif

		 		</div>
		 	</div>
			<!--TITLE Y DESCRIPTION -->



	<div class="col-md-12 ">
		<br>
	 	<div>
	 		<h4>Sugeridos</h4>
	 	</div>
			<div class="row" >
		 		@for ($i=0; $i <count($caps); $i++)
					<div class="col-md-3 col-sm-3 col-xs-3" >
						<div class="card text-center" style="width: 200px; ">
							<a href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$caps[$i]->slug] ) }}">
								<img src="/storage/episodes/{{$caps[$i]->picture}}" class="card-img-top"  height="125" width="200">
							</a>
							<div class="card-body" style="padding-left:5px; padding-right:5px; padding-top:2px; padding-bottom:2px">
								<h5 class="card-title">{{Str::limit($caps[$i]->title, 15)}}</h5>
							</div>
						</div>
					</div>

		 		@endfor
			</div>
	 </div>

</div>


@endsection
