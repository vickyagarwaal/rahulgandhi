<div class="progress-bar-area margin-top-100 padding-bottom-90 padding-top-110">
    <div class="bg-img" {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_progressbar_section_bg')) !!}></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="section-title margin-bottom-55">
                    <h3 class="title">{{get_static_option('about_page_progressbar_section_title')}}</h3>
                    <p>{{get_static_option('about_page_progressbar_section_description')}}</p>
                </div>
                <div class="progress-item-wrapper">
                    <input type="hidden" id="count" value="{{count($all_progressbar)}}">
                    @foreach ($all_progressbar as $key=> $data)
                    <input type="hidden" id="progress-val-{{$key}}" value="{{$data->progress}}">
                    <div class="progress-item">
                        <div class="single-progressbar">
                            <h4 class="subtitle">{{$data->title}}</h4>
                            <div class="progress-{{$key}}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
        (function($) {
            'use strict';
            var count = $("#count").val()
            for (var i = 0; i < count; i++) {
                var val = $("#progress-val-"+i).val()
                $(".progress-"+i).rProgressbar({
                    percentage: val,
                    fillBackgroundColor: '#14b3e4'
                });
            }
    })(jQuery);
</script>
@endsection