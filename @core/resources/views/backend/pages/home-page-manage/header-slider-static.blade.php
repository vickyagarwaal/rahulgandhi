@extends('backend.admin-master')
@section('site-title')
    {{__('Header Slider Info')}}
@endsection
@section('style')
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Header Slider Info")}}</h4>
                        <form action="{{route('admin.home.header.slider.static')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_title">{{__('Title')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_title"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_title')}}" id="header_slider_home_{{$home_page_variant_number}}_static_title">
                            </div>
                            @if(in_array($home_page_variant_number,['03','04']))
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_subtitle">{{__('Sub-Title')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_subtitle"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_subtitle')}}" id="header_slider_home_{{$home_page_variant_number}}_static_subtitle">
                            </div>
                            @endif
                            @if(in_array($home_page_variant_number,['02','03']))
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_details">{{__('Details')}}</label>
                                <textarea type="text" name="header_slider_home_{{$home_page_variant_number}}_static_details"  class="form-control" id="header_slider_home_{{$home_page_variant_number}}_static_details">{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_details')}}</textarea>
                            </div>
                            @endif
                            @if(in_array($home_page_variant_number,['03','04']))
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_btn_title">{{__('Button Title')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_btn_title"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_btn_title')}}" id="header_slider_home_{{$home_page_variant_number}}_static_btn_title">
                            </div>
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_btn_url">{{__('Button URL')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_btn_url"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_btn_url')}}" id="header_slider_home_{{$home_page_variant_number}}_static_btn_url">
                            </div>
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_btn_status"><strong>{{__('Button Status')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="header_slider_home_{{$home_page_variant_number}}_static_btn_status"  @if(!empty(get_static_option('header_slider_home_'.$home_page_variant_number.'_static_btn_status'))) checked @endif id="header_slider_home_{{$home_page_variant_number}}_static_btn_status">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            @endif
                            <x-fields.image :title="__('Background Image')" :name="'header_slider_home_'.$home_page_variant_number.'_static_image'" :dimentions="__('1900 x 900')" />
                            @if(in_array($home_page_variant_number,['03','04']))
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_right_section_text">{{__('Right Section Text')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_right_section_text"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_right_section_text')}}" id="header_slider_home_{{$home_page_variant_number}}_static_right_section_text">
                            </div>
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_right_section_sign">{{__('Right Section Sign')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_right_section_sign"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_right_section_sign')}}" id="header_slider_home_{{$home_page_variant_number}}_static_right_section_sign">
                            </div>
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_right_section_price">{{__('Right Section Price')}}</label>
                                <input type="text" name="header_slider_home_{{$home_page_variant_number}}_static_right_section_price"  class="form-control" value="{{get_static_option('header_slider_home_'.$home_page_variant_number.'_static_right_section_price')}}" id="header_slider_home_{{$home_page_variant_number}}_static_right_section_price">
                            </div>
                            <x-fields.image :title="__('Right Section Image')" :name="'header_slider_home_'.$home_page_variant_number.'_static_right_section_image'" :dimentions="__('1900 x 900')" />
                            <div class="form-group">
                                <label for="header_slider_home_{{$home_page_variant_number}}_static_right_section_status"><strong>{{__('Right Section Show/Hide')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="header_slider_home_{{$home_page_variant_number}}_static_right_section_status"  @if(!empty(get_static_option('header_slider_home_'.$home_page_variant_number.'_static_right_section_status'))) checked @endif id="header_slider_home_{{$home_page_variant_number}}_static_right_section_status">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            @endif
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<x-media.markup/>
@endsection
@section('script')
<x-media.js/>
<x-btn.update/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                 
            });
        }(jQuery));
    </script>
@endsection
