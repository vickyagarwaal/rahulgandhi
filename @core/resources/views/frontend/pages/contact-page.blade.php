@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('contact_page_name') }}
@endsection
@section('site-title')
{{ get_static_option('contact_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('contact_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('contact_page_meta_tags')}}">
@endsection
@section('content') 
<div class="contact-area padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            @if(get_static_option('contact_page_contact_section_status'))
            <div class="col-lg-5">
                <div class="contact-inner-area bg-litewhite">
                    <div class="section-title">
                        <h4 class="title"> {{get_static_option('home_page_contact_us_section_title')}} </h4>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-call"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                @foreach(explode("\n",get_static_option('home_page_contact_us_section_contact')) as $item)
                                {{$item}}<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-mail"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                @foreach(explode("\n",get_static_option('home_page_contact_us_section_email')) as $item)
                                {{$item}}<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-item">
                        <div class="icon">
                            <i class="flaticon-pin"></i>
                        </div>
                        <div class="content">
                            <p class="details">
                                @foreach(explode("\n",get_static_option('home_page_contact_us_section_address')) as $item)
                                            {{$item}}<br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(get_static_option('contact_page_map_section_status'))
            <div class="col-lg-3">
                <div class="contact_map">
                    {!! render_embed_google_map(get_static_option('contact_page_map_section_location'),get_static_option('contact_page_map_section_zoom')) !!}
                </div>
            </div>
            @endif
            @if(get_static_option('contact_page_message_section_status'))
            <div class="col-lg-4">
                <div class="contact-form style-01">
                    <form action="{{route('frontend.contact.message')}}" method="POST" class="contact-page-form" id="contact_us_form" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="captcha_token" id="gcaptcha_token">
                        <div class="row">
                            <div class="error-message margin-bottom-10 col-md-12"> </div>
                            <div class="col-md-12">
                                {!! render_form_field_for_frontend(get_static_option('contact_page_contact_form_fields')) !!}
                            </div>
                            <div class="col-md-12">
                                <div class="btn-wrapper">
                                    <a href="#" class="boxed-btn" id="contact_us_submit_btn"><span>{{__('Submit Message')}}</span></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
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
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            function removeTags(str) {
              if ((str===null) || (str==='')){
                   return false;
              }
              str = str.toString();
              return str.replace( /(<([^>]+)>)/ig, '');
           }
       
            $(document).on('click', '#contact_us_submit_btn', function (e) {
                e.preventDefault();
                var el = $(this);
                var myForm = document.getElementById('contact_us_form');
                var formData = new FormData(myForm);
                $.ajax({
                    type: "POST",
                    url: "{{route('frontend.contact.message')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i> {{__("Submitting")}}');
                    },
                    success: function (data) {
                        var errMsgContainer = $('#contact_us_form').find('.error-message');
                        errMsgContainer.html('');
                        errMsgContainer.html('<div class="alert alert-'+data.type+'">'+removeTags(data.msg)+'</div>');
                        $('#contact_us_form').find('.form-control').val('');
                        el.text('{{__("Submit")}}');
                    },
                    error: function (data) {
                        var error = data.responseJSON;
                        var errMsgContainer = $('#contact_us_form').find('.error-message');
                        errMsgContainer.html('<div class="alert alert-danger"></div>');
                        $.each(error.errors,function (index,value) {
                            errMsgContainer.find('.alert').append('<span>'+removeTags(value)+'</span>');
                        });
                        el.text('{{__("Submit")}}');
                    }
                });
            });
        }); 
        })(jQuery);
    </script>
@endsection