<br>
<div class="row">
@forelse ($courses as $course)
    <div class="col-sm-6 col-md-4 col-12">
      <div class="thumbnail">
         <img src="{{$course->pathAttachment()}}">
             <div class="captionCourse">

                <div class="text-right">
                    <span class="label label-course fontCourseLabel">{{$course->category->name}}</span>
                </div>
                <div class="text-left starts">
                    <i class="fas fa-star{{$course->rating >= 1 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 2 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 3 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 4 ? ' startColor' : ''}}"></i>
                    <i class="fas fa-star{{$course->rating >= 5 ? ' startColor' : ''}}"></i>
                </div>
                <h3>{{$course->name}}</h3>
                <p>{{Str::limit($course->description, 70)}}</p>
                <p>
                    <a href="{{ route('courses.detail', $course->slug) }}" style="color: white" class="btn bg-indigo" role="button"><i class="fas fa-chevron-circle-right"></i></a>
                </p>


           </div>
        </div>
    </div>
@empty
    <div class="col-md-12 text-center">    
           <div class="info-box">
                        <div class="iconCourse bg-indigo">
                            <i class="far fa-frown fa-4x"></i>
                        </div>
                        <div class="content">
                            <div class="textCourse">No hay cursos disponibles.</div>
                        </div>
           </div>   
    </div>
@endforelse
    <div class="col-md-12 text-center">
        {{$courses->links()}}
    </div>
</div>

@php
    
@endphp

