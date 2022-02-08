@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('testimonial_page_name') }}
@endsection
@section('site-title')
{{ get_static_option('testimonial_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('testimonial_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('testimonial_page_meta_tags')}}">
@endsection
@section('content')
    <div class="testimonial-page-content-wrap padding-top-110 padding-bottom-120">
        <div class="container">
            <div class="row">
                @foreach ($all_testimonial as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-testimonial-item single-testimonial-item2 ">
                            <div class="thumb bg-image">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <div class="content">
                                <div class="content-wrapper">
                                    <div class="icon">
                                        <i class="flaticon-right-quote-1"></i>
                                    </div>
                                    <p class="description">{{$data->description}}</p>
                                </div>
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
                <div class="col-lg-12">
                    <div class="testimonial-pagination">
                        {!! $all_testimonial->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
