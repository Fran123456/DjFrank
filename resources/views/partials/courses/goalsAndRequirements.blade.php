 <div class="row">
   	<!--GOALS-->
   	<div class="col-md-6 col-sm-12 col-12">  
         <ul class="list-group">
                <li class="list-group-item list-group-item active">Metas</li>
                @forelse($course->goals as $goal)
                   <li class="list-group-item">{{$goal->goal}}</li>
                @empty
                   <li class="list-group-item">No hay metas para este curso</li>
                @endforelse
                
         </ul>             
   	</div>
    <!--GOALS-->
    <!--REQUIREMENTS-->
   	<div class="col-md-6 col-sm-12 col-12">  
         <ul class="list-group">
                <li class="list-group-item list-group-bg-teal">Requisitos</li>
                @forelse($course->requirements as $re)
                   <li class="list-group-item">{{$re->requirement}}</li>
                @empty
                   <li class="list-group-item">No hay requisitos para este curso</li>
                @endforelse
                
         </ul>             
   	</div>
   	<!--REQUIREMENTS-->
  </div>