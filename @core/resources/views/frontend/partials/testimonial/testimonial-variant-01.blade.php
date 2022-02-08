    <!-- testimonial area start  -->
    <section class="testimonial-area bg-image bg-litewhite
            @if($home_variant_number == '01')
                    padding-top-470
            @elseif(in_array($home_variant_number,['04','03']))
                    padding-top-50
            @endif
            padding-bottom-40"
            {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_testimonial_section_bg_var1')) !!}>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-8">
                    <div class="section-title b-top-l padding-top-25 margin-bottom-55">
                        <h3 >Testimonials</h3>
                        <h4 class="title">{{get_static_option('home_page_testimonial_section_title')}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel-area">
                        <div class="testimonial-carousel">
                            @foreach ($all_testimonial as $data)
                            <div class="single-testimonial-item">
                                <div class="thumb bg-image">
                                    {!! render_image_markup_by_attachment_id($data->image) !!}
                                </div>
                                <div class="content">
                                    <div class="content-wrapper">
                                        <div class="icon">
                                            <i class="flaticon-right-quote-1"></i>
                                        </div>
                                        <?php $description = strip_tags($data->description)?>
<p class="description">
{{ \Illuminate\Support\Str::limit($description, 180, '...') }}

</p>
                                    </div>
                                    <div class="author-details">
                                        <div class="author-meta">
                                            <h4 class="title">{{$data->name}}</h4>
                                            <span class="designation">{{$data->designation}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>