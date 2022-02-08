@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('image_gallery_page_name') }}
@endsection
@section('site-title')
{{ get_static_option('image_gallery_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('image_gallery_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('image_gallery_page_meta_tags')}}">
@endsection
@section('content')
    <!-- faq-section -->
        <!-- Faq  -->
        <div class="accoridions padding-bottom-120 padding-top-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service-gallery-masonry-wrapper">
                            <div class="col-md-12">
                                <ul class="service-gallery-menu imasge-gallery-page">
                                    <li class="active" data-filter="*">{{__('All')}}</li>
                                    @foreach($image_gallery_category as $key => $data)
                                        <li data-filter=".{{Str::slug($data->title)}}">{{$data->title}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="service-gallery-masonry">
                                @foreach($all_gallery_images as $data)
                                    <div class="col-lg-3 col-md-4 col-sm-6 masonry-item {{Str::slug(get_image_category_name_by_id($data->cat_id))}}">
                                        <div class="service-gallery-single-item">
                                            <div class="thumb">
                                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                                                @php
                                                    $gallery_img = get_attachment_image_by_id($data->image,'large',false);
                                                    $img_url = !empty($gallery_img) ? $gallery_img['img_url'] : '';
                                                @endphp
                                                <div class="content">
                                                    <div class="icon">
                                                        <a class="image-popup" href="{{$img_url}}">+</a>
                                                    </div>
                                                    <h3 class="title">{{$data->title}}</h3>
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
        </div>
@endsection
