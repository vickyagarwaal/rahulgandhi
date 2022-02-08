@extends('backend.admin-master')
@section('site-title')
    {{__('Quote Area Settings')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Quote Area Settings')}}</h4>
                        <form action="{{route('admin.home.quote')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_quote_section_title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="home_page_quote_section_title" value="{{get_static_option('home_page_quote_section_title')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_quote_section_details">{{__('Details')}}</label>
                                <input type="text" class="form-control" name="home_page_quote_section_details" value="{{get_static_option('home_page_quote_section_details')}}" placeholder="{{__('Details')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_quote_section_btn_text">{{__('Button Text')}}</label>
                                <input type="text" class="form-control" name="home_page_quote_section_btn_text" value="{{get_static_option('home_page_quote_section_btn_text')}}" placeholder="{{__('Button Text')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_quote_bg_texture">{{__('Quote Background Texture')}}</label>
                                <x-image :id="'home_page_quote_bg_texture'" :name="'home_page_quote_bg_texture'" :value="'home_page_quote_bg_texture'"/>
                                <small class="form-text text-muted">{{__('1050 x 850 pixels (recommended)')}}</small>
                            </div>
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
<x-datatable.js/>
<x-media.js/>
<x-btn.update/>
@endsection
