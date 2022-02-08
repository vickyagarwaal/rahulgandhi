<section class="what-we-do-area">
    <div class="container">
        <div class="what-we-do-wrapper m-bottom bg-litewhite padding-top-120 padding-bottom-90">
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
                <div class="col-lg-3 col-md-6">
                    <div class="do-single-item margin-bottom-30">
                        <div class="icon">
                            <i class="{{$data->icon}}"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                <a href="{{route('frontend.services.single',['slug'=>$data->slug,'id'=>$data->id])}}">{{$data->title}}</a>
                            </h4>
                            <p>{{$data->excerpt}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>