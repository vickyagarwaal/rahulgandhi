@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('service_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('service_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('service_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('service_page_meta_tags')}}">
@endsection
@section('content')
<section class="what-we-do-area padding-bottom-90 padding-top-120">
    <div class="container">
        <div class="row">
            @foreach($all_services as $data)
            <div class="col-lg-4 col-md-6">
                <div class="do-single-item with-thumb margin-bottom-30">
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id($data->image) !!}
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
            <div class="col-lg-12">
                <div class="pagination-wrapper">
                    {{$all_services->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@if(get_static_option('service_page_counterup_section_status'))
    @include('frontend.partials.counterup-area')
@endif
@endsection
