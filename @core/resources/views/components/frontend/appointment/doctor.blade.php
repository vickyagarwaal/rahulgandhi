<div class="team-single-item">
    <div class="thumb">
        {!! render_image_markup_by_attachment_id($image,'','grid') !!}
        <a href="{{route('frontend.appointment.single',['slug' => $slug, 'id' => $id])}}" class="btn-medheal">{{get_static_option('appointment_page_booking_button_text')}}</a>
    </div>
    <div class="content">
        @if(!empty($designation))
            <span class="designation">{{$designation}}</span>
        @endif
        @if($location)
            <div class="location margin-bottom-10"><i class="fas fa-map-marked-alt"></i>  {{$location}}</div>
        @endif
        <h4 class="title"><a href="{{route('frontend.appointment.single',['slug' => \Illuminate\Support\Str::slug($slug), 'id' => $id])}}">{{$title}}</a> </h4>
    </div>
</div>