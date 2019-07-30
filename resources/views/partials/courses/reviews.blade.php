<div class="align-content-center">
    
    <div class="container-fluid">
        <div class="row">
          <div class="card">
                <div class="header">
                   <h2>Valoraciones de nuestros estudiantes</h2>
                 </div>
                  <div class="body">
                     @forelse($course->reviews as $review)
                         <div class="media" style="margin-bottom: 3px">
                             <div class="media-left">
                                <a href="javascript:void(0);"><img class="media-object imgCircle" src="{{ $review->user->pathAttachment() }}" width="54" height="54"> </a>
                             </div>
                             <div class="media-body">

                              {{ $review->user->name}}
                              {{ $review->created_at->format('d/m/Y') }}
                               <div style="margin-top: 2px" class="text-left starts">
                                                <i class="fas fa-star{{$review->rating >= 1 ? ' startColor' : ''}}"></i>
                                                <i class="fas fa-star{{$review->rating >= 2 ? ' startColor' : ''}}"></i>
                                                <i class="fas fa-star{{$review->rating >= 3 ? ' startColor' : ''}}"></i>
                                                <i class="fas fa-star{{$review->rating >= 4 ? ' startColor' : ''}}"></i>
                                                <i class="fas fa-star{{$review->rating >= 5 ? ' startColor' : ''}}"></i>
                                </div>

                                @if($review->comment)
                                  {{ $review->comment }}
                                @endif
                            </div>
                       @empty
                        <h3>No hay valoraciones.</h3>
                       @endforelse
                     </div>   
                              
                </div>
            </div>
        </div>
    </div>
</div>








