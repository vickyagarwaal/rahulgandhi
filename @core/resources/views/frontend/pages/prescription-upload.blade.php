@extends('frontend.frontend-page-master')
@section('page-title')
    {{ get_static_option('prescription_page_name') }}
@endsection
@section('site-title')
{{ get_static_option('prescription_page_name') }}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('prescription_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('prescription_page_meta_tags')}}">
@endsection
@section('content')
    <!-- faq-section -->
        <!-- Faq  -->
        <div class="prescription-page-content-wrapper padding-bottom-120 padding-top-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                       <div class="prescription-upload-container">
                           <h2 class="title margin-bottom-50">{{get_static_option('prescription_form_title')}}</h2>
                           <x-msg.error/>
                           <x-msg.success/>
                           <form action="{{route('frontend.prescription')}}" method="post" enctype="multipart/form-data">
                               @csrf
                               @if(auth()->guard('web')->check())

                               @endif
                                   <div class="form-group">
                                       <label for="">{{__('Name')}}</label>
                                       <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                   </div>
                                   <div class="form-group">
                                       <label for="">{{__('Email')}}</label>
                                       <input type="email" name="email" class="form-control" value="{{old('email')}}" >
                                   </div>
                                   <div class="form-group">
                                       <label for="">{{__('Phone')}}</label>
                                       <input type="tel" name="phone" class="form-control" value="{{old('phone')}}">
                                   </div>
                                   <div class="form-group">
                                       <label for="">{{__('Additional Message')}}</label>
                                       <textarea class="form-control" name="customer_message" id="" rows="7"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="">{{__('Upload Prescription')}}</label>
                                       <input type="file" name="customer_prescription" id="image" class="form-control" >
                                       <small class="text text-danger"><sup>*</sup>{{__(' .jpg, .jpeg, .png ,.pdf')}} </small>
                                   </div>
                                   <div id="preview_image"></div>

                               <div class="btn-wrapper">
                                   <button class="boxed-btn" type="submit">{{get_static_option('prescription_button_text')}}</button>
                               </div>
                           </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <x-btn.submit/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                function previewFile() {
                    var $preview = $('#preview_image').empty();
                    if (this.files) $.each(this.files, readAndPreview);
                    function readAndPreview(i, file) {
                        var reader = new FileReader();
                        $(reader).on("load", function() {
                            $preview.append($("<img/>", {src:this.result, height:100}));
                        });
                        reader.readAsDataURL(file);
                    }
                }
                $('#image').on("change", previewFile);
            });
        })(jQuery);
    </script>
@endsection