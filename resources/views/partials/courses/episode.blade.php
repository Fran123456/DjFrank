<!--SECTIONS END EPISODES-->     
 <br>      
<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <div class="card">
        <div class="header"><h2>SECCIONES DEL CURSO:</h2></div>
        <div class="body">
           <div class="row clearfix">
              <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
               @php
                 $co = 1; $sec = 0;
               @endphp
               @forelse($course->sections as $key => $section)
               <div class="panel-group " id="accordion{{$key}}" role="tablist" aria-multiselectable="true">
                    <div class="panel {{$colors[$sec]}}">
                    <div class="panel-heading" role="tab" id="headingOne{{$key}}">
                       <h4 class="panel-title" style="color: white">
                          <a style="color: white" role="button" data-toggle="collapse" href="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}" class="collapsed">
                              {{$key+1}} - {{$section->name}}
                          </a>
                       </h4>
                    </div>
                     <div id="collapseOne{{$key}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{$key}}" aria-expanded="false" style="height: 0px;">
                         <div class="panel-body">
	                            <div class="list-group">                           
			                        @forelse($section->episodes as $n => $episode) <!--1-->
								    <!--VALIDACION-->
		                            @auth <!--2--> 
										@can('opt_for_course', $course) <!--3-->
											@can('subscribe', \App\Course::class)<!--4-->
												<li  class="list-group-item">{{$co+$n}} - {{$episode->title}}</li>
										    @else<!--4-->
											   <!-- No se puede subscribir porque ya es usuario del grupo-->
												@can('inscribe', $course)<!--5-->
													{{$co+$n}} - {{$episode->title}}
												@else<!--5-->
													<a href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$episode->slug] ) }}" class="list-group-item ">{{$co+$n}} - {{$episode->title}}</a>
												@endcan<!--5-->
										    @endcan<!--4-->
										@else<!--3-->
											<a href="{{ route('episode', ['course'=> $course->slug , 'episode' =>$episode->slug] ) }}" class="list-group-item ">{{$co+$n}} - {{$episode->title}}</a>
									    @endcan<!--3-->
									@else <!--2-->
										<li  class="list-group-item">{{$co+$n}} - {{$episode->title}}</li>
									@endauth  <!--2-->
									<!--VALIDACION-->
								    @empty <!--1-->
								         No hay capítulos para esta sección
								    @endforelse  <!--1-->
								</div>
							      @php
							         $co = $co+$n+1;
							      @endphp
                             </div>
                          </div>
                      </div>
                </div>
                    @php
                         if($key == 0){
                            $sec++;
                          }else{
                            if($key%6 ==0)$sec =0;
                            else $sec++;
                         }
                                		
                   @endphp
                @empty
					<li class="list-group-item">No hay secciones para este curso</li>
				@endforelse
                </div>
             </div>
          </div>
      </div>
   </div>
</div>
  <!--SECTIONS END EPISODES-->
