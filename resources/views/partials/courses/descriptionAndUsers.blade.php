 <!--DESCRIPTION AND MORE-->
        <!-- Nav tabs -->
       <ul class="nav nav-tabs" role="tablist" style="background-color: white">
             <li role="presentation" class="">
                                    <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="true">
                                        <i class="material-icons">home</i> ¿QUE HAREMOS?
                                    </a>

             </li>
             <li role="presentation" class="active">
                                    <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">face</i> ALUMNOS
                                    </a>
              </li>

        </ul>

          <!-- Tab panes -->
          <div class="tab-content" style="background-color: white">
                 <div role="tabpanel" class="tab-pane fade " style="padding-left: 20px" id="home_with_icon_title">
                                    <b>¿Que vamo hacer?</b>
                                    <p>{{$course->description}}</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade active in  " style="padding-left: 20px" id="profile_with_icon_title">

            <!--LIST STUDENTS-->
                     <div class="bs-example" data-example-id="media-alignment">

                                @forelse($users as $key => $students)
                                <div class="media">
                                    <div class="media-left media-bottom">
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="/storage/users/{{$students->picture}}" width="50" height="50">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$students->name}}</h4>
                                        <p>
                                            {{$students->email}}
                                        </p>

                                    </div>
                                </div>
                                @empty
                                 No hay estudiantes inscritos en este curso
                                @endforelse
                            </div>

                            {{$users->render()}}
                 <!--LIST STUDENTS-->
                  </div>
           </div>
  <!--DESCRIPTION-->
