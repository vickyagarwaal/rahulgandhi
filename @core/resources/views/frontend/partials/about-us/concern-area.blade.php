<section class="concern-area padding-top-20 padding-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="concern-img bg-image-02" {!! render_background_image_markup_by_attachment_id(get_static_option('about_page_testimonial_section_bg_img')) !!}>
                    @if(!empty(get_static_option('about_page_concern_section_vdo_btn_status')))
                    <div class="vdo-btn">
                        <a class="video-play-btn mfp-iframe" href="{{get_static_option('about_page_concern_section_vdo_btn_url')}}"><i class="{{get_static_option('about_page_concern_section_vdo_btn_icon')}}"></i></a>
                    </div>
                    @endif
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id(get_static_option('about_page_testimonial_section_img')) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="concern-content-wrapper">
                    <div class="concern-content">
                        <div class="content">
                            <div class="section-title">
                                <h2 class="title">{{get_static_option('about_page_concern_section_title')}}</h2>
                                <p>{{get_static_option('about_page_concern_section_description')}}</p>
                            </div>
                            <div class="author-details">
                                <div class="author-sign">
                                    {!! render_image_markup_by_attachment_id(get_static_option('about_page_testimonial_section_sign_img')) !!}
                                </div>
                                <div class="author-meta">
                                    <h4 class="title">{{get_static_option('about_page_concern_section_name')}}</h4>
                                    <span class="designation">{{get_static_option('about_page_concern_section_designation')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>