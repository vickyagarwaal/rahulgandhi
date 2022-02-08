@extends('frontend.frontend-page-master')
@section('site-title')
    {{$service_item->title}}
@endsection
@section('page-title')
    {{$service_item->title}}   
@endsection
@section('page-meta-data')
<meta name="title" content="{{$service_item->meta_title}}">
<meta name="tags" content="{{$service_item->meta_tags}} ">
<meta name="description" content="{{$service_item->meta_description}}">
@endsection
@section('og-meta')
<meta name="og:title" content="{{$service_item->og_meta_title}}">
<meta name="og:description" content="{{$service_item->og_meta_description}}">
{!! render_og_meta_image_by_attachment_id($service_item->og_meta_image) !!}
@endsection
@section('content')
<div class="page-content our-attoryney padding-top-120 padding-bottom-55">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-item">
                    <div class="thumb padding-bottom-40">
                        {!! render_image_markup_by_attachment_id($service_item->image) !!}
                    </div>
                    <p>{!! purify_html_raw($service_item->description) !!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <x-msg.all/>
                {!! render_frontend_sidebar('service',['column' => false]) !!}
            </div>
        </div>
    </div>
</div>
@if(get_static_option('service_page_counterup_section_status'))
    @include('frontend.partials.counterup-area')
@endif
@endsection

@section('scripts')
@if(!empty(get_static_option('site_google_captcha_v3_site_key')))
<script
        src="https://www.google.com/recaptcha/api.js?render={{get_static_option('site_google_captcha_v3_site_key')}}"></script>
<script>
    (function() {
        "use strict";
        grecaptcha.ready(function () {
            grecaptcha.execute("{{get_static_option('site_google_captcha_v3_site_key')}}", {action: 'homepage'}).then(function (token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    })();
</script>
@endif
@endsection
