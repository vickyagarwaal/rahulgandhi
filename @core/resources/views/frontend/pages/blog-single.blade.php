@extends('frontend.frontend-page-master')
@section('site-title')
    {{$blog_post->meta_title}}
@endsection
@section('page-title')
    {{$blog_post->title}}   
@endsection
@section('page-meta-data')
<meta name="title" content="{{$blog_post->meta_title}}">
<meta name="tags" content="{{$blog_post->meta_tags}} ">
<meta name="description" content="{{$blog_post->meta_description}}">
@endsection
@section('og-meta')
<meta name="og:title" content="{{$blog_post->og_meta_title}}">
<meta name="og:description" content="{{$blog_post->og_meta_description}}">
{!! render_og_meta_image_by_attachment_id($blog_post->og_meta_image) !!}
<meta name="og:tags" content=" {{$blog_post->meta_tags}}">
@endsection
@section('content')
        <!-- Blog Details Area -->
        <div class="page-content our-attoryney padding-bottom-120 padding-top-120">
            <div class="container margin-bottom-120">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-item">
                            <div class="thumb margin-bottom-20">
                                @php $post_img = null; @endphp
                                {!! render_image_markup_by_attachment_id($blog_post->image) !!}
                            </div>
                            <div class="blog-details-item-header">
                                <ul class="post-meta">
                                    <li><a><i class="fa fa-user"></i>{{ ($blog_post->author) ?? __("Anonymous")}}</a></li>
                                    <li class="date"><a><i class="far fa-calendar-alt"></i>{{ $blog_post->created_at->diffForHumans()}}</a></li>
                                    <li class="category"><a href="{{route('frontend.blog.category',['id' => optional($blog_post->category)->id,'any' => Str::slug($blog_post->category->name ?? '')])}}"><i class="fas fa-tag"></i>{{ $blog_post->category->name ?? ''}}</a></li>
                                </ul>
                            </div>
                            <p>{!! \Mews\Purifier\Facades\Purifier::clean($blog_post->content) !!}</p>
                        </div>
                        <div class="blog-details-footer">
                            <div class="left">
                                <ul class="tags">
                                    <li class="title">{{__('Tags: ')}}</li>
                                    @php
                                        $all_tags = explode(',',$blog_post->tags);
                                    @endphp
                                    @foreach($all_tags as $tag)
                                        @php 
                                        $slug = Str::slug($tag);
                                        @endphp 
                                        @if (!empty($slug))
                                            <li><a href="{{route('frontend.blog.tags.page',['name' => $slug])}}">{{$tag}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <div class="social-share">
                                    <ul>
                                        <li class="title"><i class="fas fa-share-alt"></i>{{__('Share:')}}</li>
                                        {!! \Mews\Purifier\Facades\Purifier::clean(single_post_share(route('frontend.blog.single',['id' => $blog_post->id, 'any' => Str::slug($blog_post->title,'-')]),$blog_post->title,$post_img)) !!}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <div id="disqus_thread"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="widget-area">
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
@section('scripts')
    <script>
        var disqus_config = function () {
        this.page.url = "{{route('frontend.blog.single',['id' => $blog_post->id, 'any' => Str::slug(strip_tags(Purifier::clean($blog_post->title)),'-')])}}";
        this.page.identifier = "{{$blog_post->id}}";
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = "https://{{get_static_option('site_disqus_key')}}.disqus.com/embed.js";
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>{{__('Please enable JavaScript to view the')}} <a href="https://disqus.com/?ref_noscript">{{__('comments powered by Disqus.')}}</a></noscript>
@endsection
