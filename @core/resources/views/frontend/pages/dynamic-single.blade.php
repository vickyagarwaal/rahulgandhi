@extends('frontend.frontend-page-master')
@section('site-title')
    {{$page_post->meta_title ?? $page_post->title}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{$page_post->meta_description}}">
    <meta name="tags" content="{{$page_post->meta_tags}}">
    <meta name="og:title" content="{{$page_post->og_meta_title}}"/>
    <meta name="og:description" content="{{$page_post->og_meta_description}}"/>
    <meta name="og:site_name" content="{{get_static_option('og_meta_site_name')}}"/>
    <meta name="og:url" content="{{route('frontend.dynamic.page',[$page_post->slug,$page_post->id])}}"/>
    {!! render_og_meta_image_by_attachment_id($page_post->og_meta_image) !!}
@endsection
@section('page-title')
    {{$page_post->title}}
@endsection
@section('content')
    <section class="dynamic-page-content-area padding-top-50 padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dynamic-page-content-wrap">
                        {!! $page_post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
