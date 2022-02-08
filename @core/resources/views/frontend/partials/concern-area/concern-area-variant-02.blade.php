<section class="concern-area padding-top-120 padding-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="concern-img bg-image-02" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_'.$home_variant_number.'_bg_img')) !!}>
                    @if(!empty(get_static_option('home_page_concern_section_vdo_btn_status')))
                    <div class="vdo-btn">
                        <a class="video-play-btn mfp-iframe" href="{{get_static_option('home_page_concern_section_vdo_btn_url')}}"><i class="{{get_static_option('home_page_concern_section_vdo_btn_icon')}}"></i></a>
                    </div>
                    @endif
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_'.$home_variant_number.'_img')) !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6">
                <div class="concern-content-wrapper">
                    <div class="concern-content">
                        <div class="content">
                            <x-frontend.concern.titles/>
                            <x-frontend.concern.details/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>