@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('blog_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('blog_page_name')}}
@endsection
@section('page-meta-data')
<meta name="description" content="{{get_static_option('blog_page_meta_description')}}">
<meta name="tags" content="{{get_static_option('blog_page_meta_tags')}}">
@endsection
@section('content')
<div class="page-content our-attoryney padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            @if(count($all_blogs) < 1)
                <div class="col-lg-8">
                    <div class="alert alert-warning alert-block col-md-12">
                        <strong><div class="error-message"><span>{{__('No posts available')}}</span></div></strong>
                    </div>
                </div>
            @endif
            <div class="col-lg-8">
                @foreach($all_blogs as $key => $data)
                    <div class="blog-classic-item-01 margin-bottom-60">
                        <div class="thumbnail">
                            {!! render_image_markup_by_attachment_id($data->image) !!}
                        </div>
                        <div class="content-wrapper">
                            <div class="content">
                                <ul class="post-meta">
                                    <li><a><i class="fa fa-user"></i>{{ ($data->author) ?? __("Anonymous")}}</a></li>
                                    <li class="date"><a><i class="far fa-calendar-alt"></i>{{ $data->created_at->diffForHumans()}}</a></li>
                                    <li class="category"><a href="{{route('frontend.blog.category',['id' => optional($data->category)->id,'any' => Str::slug($data->category->name ?? '')])}}"><i class="fas fa-tag"></i>{{ $data->category->name ?? ''}}</a></li>
                                </ul>
                                <h4 class="title"><a href="{{route('frontend.blog.single',['slug' => $data->slug, 'id' => $data->id])}}">{{ $data->title }}</a></h4>
                                <p>{!! \Str::words(strip_tags($data->content),52,'') !!}</p>
                                <div class="btn-wrapper">
                                    <a href="{{route('frontend.blog.single',['slug' => $data->slug, 'id' => $data->id])}}" class="read-btn">{{__('Read More')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="blog-pagination desktop-center">
                    {{$all_blogs->links()}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area bg-litewhite">
                    @include('frontend.partials.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
@if(get_static_option('blog_page_counterup_section_status'))
    @include('frontend.partials.counterup-area')
@endif
@endsection