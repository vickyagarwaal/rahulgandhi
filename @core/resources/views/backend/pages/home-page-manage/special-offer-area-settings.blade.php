@extends('backend.admin-master')
@section('site-title')
    {{__('Special Offer Settings')}}
@endsection
@section('style')
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Special Offer Area Settings')}}</h4>
                        <form action="{{route('admin.home.special.offer')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_special_offer_section_title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="home_page_special_offer_section_title" value="{{get_static_option('home_page_special_offer_section_title')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group"> 
                                <label for="home_page_special_offer_section_details">{{__('Details')}}</label>
                                <textarea type="text" name="home_page_special_offer_section_details"  class="form-control" >{{get_static_option('home_page_special_offer_section_details')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="home_page_special_offer_section_offer_end_date">{{__('Offer End Date')}}</label>
                                <input type="date" class="form-control datepicker"  id="home_page_special_offer_section_offer_end_date" name="home_page_special_offer_section_offer_end_date" value="{{get_static_option('home_page_special_offer_section_offer_end_date')}}" placeholder="{{__('offer end date')}}">
                            </div>
                            @if($home_page_variant_number == '03')
                            <x-fields.image :title="__('Background Image')" :name="'home_page_special_offer_section_bg'" :dimentions="__('380 x 450')" />
                            @else
                            <x-fields.image :title="__('Background Image')" :name="'home_page_special_offer_section_bg_2'" :dimentions="__('380 x 450')" />
                            @endif
                            <div class="row">
                                <div class="col-md-2">
                                    <x-fields.switch :title="__('Button Status')" :name="'home_page_special_offer_section_btn_status'" :btn_id="'home_page_special_offer_section_btn_status'" :type="'show'"/>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="home_page_special_offer_section_btn_txt">{{__('Button Text')}}</label>
                                        <input type="text" name="home_page_special_offer_section_btn_txt" value="{{get_static_option('home_page_special_offer_section_btn_txt')}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="home_page_special_offer_section_btn_url">{{__('Button URL')}}</label>
                                        <input type="text" name="home_page_special_offer_section_btn_url" value="{{get_static_option('home_page_special_offer_section_btn_url')}}" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            @if($home_page_variant_number == '04')
                            <hr>
                            <h4 class="header-title">{{__('Right Section Settings')}}</h4>
                            <div class="form-group">
                                <label for="home_page_special_offer_section_title_right">{{__('Right Section Title')}}</label>
                                <input type="text" class="form-control" name="home_page_special_offer_section_title_right" value="{{get_static_option('home_page_special_offer_section_title_right')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group"> 
                                <label for="home_page_special_offer_section_details_right">{{__('Right Section Details')}}</label>
                                <textarea type="text" name="home_page_special_offer_section_details_right"  class="form-control" >{{get_static_option('home_page_special_offer_section_details_right')}}</textarea>
                            </div>
                            <x-fields.image :title="__('Right Section Background Image')" :name="'home_page_special_offer_section_bg_right'" :dimentions="__('380 x 450')" />
                            <div class="row">
                                <div class="col-md-2">
                                    <x-fields.switch :title="__('Right Section Button Status')" :name="'home_page_special_offer_section_btn_status_right'" :btn_id="'home_page_special_offer_section_btn_status_right'" :type="'show'"/>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="home_page_special_offer_section_btn_txt_right">{{__('Right Section Button Text')}}</label>
                                        <input type="text" name="home_page_special_offer_section_btn_txt_right" value="{{get_static_option('home_page_special_offer_section_btn_txt_right')}}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="home_page_special_offer_section_btn_url_right">{{__('Right Section Button URL')}}</label>
                                        <input type="text" name="home_page_special_offer_section_btn_url_right" value="{{get_static_option('home_page_special_offer_section_btn_url_right')}}" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            @endif
                            <button type="submit" id="update" class="btn btn-primary pr-4 pl-4">{{__('Update Settings')}}</button>
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
<x-icon-picker.js/>
<x-btn.update/>
@endsection