    <!-- Concern Area -->
    <section class="concern-area padding-top-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="concern-img bg-image" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_'.$home_variant_number.'_bg_img')) !!}>
                        {!! render_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_'.$home_variant_number.'_img')) !!}
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
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