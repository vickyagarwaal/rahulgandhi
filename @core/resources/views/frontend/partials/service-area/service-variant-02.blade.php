<section class="what-we-do-area padding-bottom-90 padding-top-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-11 col-11">
                <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                    <h2 class="title">{{get_static_option('home_page_what_we_do_section_title')}}</h2>
                    <p>{{get_static_option('home_page_what_we_do_section_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($all_services as $data)
            <div class="col-lg-4 col-md-6 margin-bottom-30">
                <div class="do-single-item-02 bg-image" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
                    <div class="content">
                        <div class="icon">
                            <i class="{{$data->icon}}"></i>
                        </div>
                        <h4 class="title">
                            <a href="{{route('frontend.services.single',['slug'=> \Illuminate\Support\Str::slug($data->slug),'id'=>$data->id])}}">{{$data->title}}</a>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>