
@cannot('inscribe', $course)
    @can('review', $course)

        <div class="col-12 pt-0 mt-4 text-center">
            <h2 class="text-muted">{{ __("Escribe una valoración") }}</h2><hr />
        </div>

        <div class="container-fluid">
            <form method="POST" action="{{ route('courses.add_review') }}" class="form-inline" id="rating_form">
                @csrf
                <div class="form-group">
                    <div class="col-12">
                        <ul id="list_rating" class="list-inline" style="font-size: 30px;">
                            <li id="1" class="list-inline-item star" data-number="1"><i class="fa fa-star startColor"></i></li>
                            <li id="2" class="list-inline-item star" data-number="2"><i class="fa fa-star"></i></li>
                            <li id="3" class="list-inline-item star" data-number="3"><i class="fa fa-star"></i></li>
                            <li id="4" class="list-inline-item star" data-number="4"><i class="fa fa-star"></i></li>
                            <li id="5" class="list-inline-item star" data-number="5"><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>

                <br />

                <input type="hidden" name="rating_input" id="rating_input" value="1" />
                <input type="hidden" name="course_id" value="{{ $course->id }}" />

                <div class="form-group">
                    <div class="col-12">
                        <textarea
                            placeholder="{{ __("Escribe una reseña") }}"
                            id="message"
                            name="message"
                            class="form-control no-resize"
                            rows="8"
                            cols="120"
                        ></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-warning text-white">
                    <i class="fa fa-space-shuttle"></i> {{ __("Valorar curso") }}
                </button>
            </form>
        </div>
    @endcan
@endcannot


    <script>
        jQuery(document).ready(function() {
                const ratingSelector = jQuery('#list_rating');
                ratingSelector.find('li').on('click', function () {
                const number = $(this).data('number');
                $('#rating_input').val(number)

                for (var i = 0; i < 5; i++) {
                   $("#"+(i+1)).removeClass('startColor');
                 }

                for (var i = 0; i < number; i++) {
                    $("#"+(i+1)).addClass('startColor');
                }
            })
        });




    </script>
