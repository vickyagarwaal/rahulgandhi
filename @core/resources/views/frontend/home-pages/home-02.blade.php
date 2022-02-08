<div class="header-style-01 home-variant-{{$home_variant_number}}">
    @if (get_static_option('home_page_topbar_section_status'))
        @include('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number))
        @endif
    @if (get_static_option('home_page_infobar_section_status'))
        @include('frontend.partials.infobar')
    @endif
    @if (get_static_option('home_page_navbar_section_status'))
        @include('frontend.partials.navbar.navbar-home-02')
    @endif
</div>
@if(get_static_option('home_page_header_slider_section_status'))
    <div class="header-slider">
        <div class="header-area style-01 header-bg-02" {!! render_background_image_markup_by_attachment_id(get_static_option('header_slider_home_'.$home_variant_number.'_static_image')) !!}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-inner-wrap">
                            <div class="header-inner">
                                <!-- header inner -->
                                <h1 class="title">{{get_static_option('header_slider_home_'.$home_variant_number.'_static_title')}}</h1>
                                <p>{{get_static_option('header_slider_home_'.$home_variant_number.'_static_details')}}</p>
                            </div>
                        </div>
                        <!-- //.header inner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(get_static_option('home_page_concern_area_section_status'))
    @include('frontend.partials.concern-area.concern-area-variant-02')
@endif
@if(get_static_option('home_page_keyfeature_section_status'))
    @include('frontend.partials.keyfeature.keyfeature-variant-1')
@endif
@if(get_static_option('home_page_service_section_status'))
    @include('frontend.partials.service-area.service-variant-02')
@endif
@if(get_static_option('home_page_call_to_us_section_status'))
    @include('frontend.partials.call-to-us-area')
@endif
@if(get_static_option('home_page_appointment_section_status'))
    @include('frontend.partials.appointment-area')
@endif
@if(get_static_option('home_page_testimonial_section_status'))
    @include('frontend.partials.testimonial.testimonial-variant-02')
@endif
@if(get_static_option('home_page_image_gallery_section_status'))
    @include('frontend.partials.image-gallery.image-gallery-02')
@endif
@if(get_static_option('home_page_latest_blog_section_status'))
    @include('frontend.partials.latest-blog-area')
@endif
@if(get_static_option('home_page_counterup_section_status'))
    @include('frontend.partials.counterup-area')
@endif