    <!-- testimonial area start  -->
    <section class="testimonial-area bg-grey padding-top-120 padding-bottom-90">
        <div class="bg-img" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_bg_var2')) !!}></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title white b-top-l padding-top-25 margin-bottom-55">
                        <h3 class="title">{{get_static_option('home_page_testimonial_section_title')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($all_testimonial as $data)
                <div class="col-lg-7">
                    <div class="single-testimonial-item-02 margin-bottom-30">
                        <div class="icon">
                            <i class="flaticon-right-quote-1"></i>
                        </div>
                        <div class="content">
                            <p class="description">{{$data->description}}</p>
                            <div class="author-details">
                                <div class="author-meta">
                                    <h4 class="title">{{$data->name}}</h4>
                                    <span class="designation">{{$data->designation}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>