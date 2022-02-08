@extends('backend.admin-master')
@section('site-title')
    {{__('Call To US Settings')}}
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
                        <h4 class="header-title">{{__('Call To US Area Settings')}}</h4>
                        <form action="{{route('admin.home.call.to.us')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_call_to_us_section_title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="home_page_call_to_us_section_title" value="{{get_static_option('home_page_call_to_us_section_title')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_call_to_us_section_support_title">{{__('Support Area Title')}}</label>
                                <input type="text" class="form-control"  id="home_page_call_to_us_section_support_title" value="{{get_static_option('home_page_call_to_us_section_support_title')}}" name="home_page_call_to_us_section_support_title" placeholder="{{__('Support Area Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_call_to_us_section_support_details">{{__('Support Area Details')}}</label>
                                <input type="text" class="form-control"  id="home_page_call_to_us_section_support_details" value="{{get_static_option('home_page_call_to_us_section_support_details')}}" name="home_page_call_to_us_section_support_details" placeholder="{{__('Support Area Details')}}">
                            </div>
                            <x-icon-picker.field :title="__('Support Area Icon')" :name="'home_page_call_to_us_section_support_icon'" :id="'home_page_call_to_us_section_support_icon'" :value="'home_page_call_to_us_section_support_icon'"/>
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