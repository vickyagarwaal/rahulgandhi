<section class="blog-area padding-top-50 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title b-top desktop-center padding-top-25 margin-bottom-40">
                    <h3 class="title">{{get_static_option('home_page_latest_blog_section_title')}}</h3>
                    <p>{{get_static_option('home_page_latest_blog_section_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($all_latest_blogs as $data)
            <div class="col-lg-6 col-xl-4">
                <div class="single-blog-grid-01 margin-bottom-30">
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id($data->image) !!}
                    </div>
                    <div class="content-wrapper">
                        <div class="content">
                            
                            <h4 class="title"><a href="{{route('frontend.blog.single',['slug' => $data->slug, 'id' => $data->id])}}">{{$data->title}}</a></h4>
                            <div class="btn-wrapper">
                                <a href="{{route('frontend.blog.single',['slug' => $data->slug, 'id' => $data->id])}}" class="read-btn">{{__('Read More')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>