@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('faq_page_name') }}
@endsection
@section('site-title')
{{ get_static_option('faq_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('faq_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('faq_page_meta_tags')}}">
@endsection
@section('content')
    <!-- faq-section -->
        <!-- Faq  -->
        <div class="accoridions padding-bottom-120 padding-top-50">
            <div class="container">
                <div class="row justify-content-center padding-bottom-50">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-title desktop-center">
                            <h2 class="title">{{ get_static_option('faq_page_section_title')}}</h2>
                            <p> {{ get_static_option('faq_page_section_description')}} </p>
                        </div>
                        <!-- //. section title -->
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion-wrapper">
                            <!-- accordion wrapper -->
                            <div id="accordion">
                                @foreach ($all_faqs as $key => $faq)
                                <div class="card">
                                    <div class="card-header" id="headingOwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOwo-{{$key}}" aria-expanded="false" aria-controls="collapseOwo-{{$key}}">
                                                {{$faq->title}}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOwo-{{$key}}" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            {{$faq->description}}
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
