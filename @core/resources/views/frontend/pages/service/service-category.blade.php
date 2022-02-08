@extends('frontend.frontend-page-master')
@section('page-title')
    {{get_static_option('service_page_name')}} {{__('Category:')}} {{$category_name}}
@endsection
@section('site-title')
    {{get_static_option('service_page_name')}} {{__('Category:')}} {{$category_name}}
@endsection
@section('content')
<section class="what-we-do-area padding-bottom-90 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(count($service_item) == '0')   
                <div class="col-lg-12">
                    <div class="alert alert-danger">{{__('No Post Available In This Category')}}</div>
                </div>
                @endif
                <div class="row">
                    @foreach($service_item as $data)
                    <div class="col-lg-6 col-md-6">
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

                </div>
            </div>
            <div class="col-lg-4">
                <x-msg.all/>
                {!! render_frontend_sidebar('service',['column' => false]) !!}
            </div>
            <div class="col-lg-12">
                <div class="pagination-wrapper">
                    {{$service_item->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
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