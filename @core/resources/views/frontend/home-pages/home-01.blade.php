<div class="header-style-01">
    @if (get_static_option('home_page_topbar_section_status'))
        @include('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number))
    @endif
    @if (get_static_option('home_page_navbar_section_status'))
        @include('frontend.partials.navbar.navbar-home-01')
    @endif
</div>
@if(get_static_option('home_page_header_slider_section_status'))
    <div class="header-slider-one">
        @foreach ($header_sliders as $data)
        <div class="header-area header-bg" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-inner">
                            <!-- header inner -->
                            <span>{{$data->subtitle}}</span>
                            <h1 class="title style-01">{{$data->title}}</h1>
                            <div class="header-bottom">
                                @if(!empty($data->btn_status))
                                <div class="btn-wrapper  desktop-left">
                                    <a href="{{$data->btn_url}}" class="boxed-btn">{{$data->btn_txt}}</a>
                                </div>
                                @endif
                                @if(!empty($data->vdo_btn_status))
                                <div class="vdo-btn">
                                    <a class="video-play mfp-iframe" href="{{$data->vdo_btn_url}}"><i class="fas fa-play"></i>{{$data->vdo_btn_txt}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- //.header inner -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@if(get_static_option('home_page_header_bottom_section_status'))
    <div class="header-bottom-area">
        <div class="container">
            <div class="header-bottom-wrapper m-top padding-bottom-100">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="single-icon-box-list">
                            @foreach ($all_header_bottom_items as $data)
                                <li class="single-icon-box-01">
                                    <div class="icon">
                                        <i class="{{$data->icon}}"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{$data->title}}</h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(get_static_option('home_page_medical_care_section_status'))
    @include('frontend.partials.medical-care-info')
@endif
@if(get_static_option('home_page_concern_section_status'))
    @include('frontend.partials.concern-area.concern-area-variant-01')
@endif
@if(get_static_option('home_page_service_section_status'))
    @include('frontend.partials.service-area.service-variant-01')
@endif
@if(get_static_option('home_page_expert_section_status'))
    @include('frontend.partials.expert-area')
@endif
@if(get_static_option('home_page_appointment_section_status'))
    @include('frontend.partials.appointment-area')
@endif
@if(get_static_option('home_page_testimonial_section_status'))
    @include('frontend.partials.testimonial.testimonial-variant-01')
@endif
@if(get_static_option('home_page_image_gallery_section_status'))
    @include('frontend.partials.image-gallery.image-gallery-01')
@endif
@if(get_static_option('home_page_latest_blog_section_status'))
    @include('frontend.partials.latest-blog-area')
@endif
@if(get_static_option('home_page_counterup_section_status'))
    @include('frontend.partials.counterup-area')
@endif
