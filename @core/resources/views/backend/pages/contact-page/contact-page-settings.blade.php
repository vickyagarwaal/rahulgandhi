@extends('backend.admin-master')
@section('site-title')
    {{__('Contact Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Contact Page Settings')}}</h4>
                        <form action="{{route('admin.contact.page.settings')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_contact_us_section_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_contact_us_section_title" class="form-control" placeholder="{{__('Title')}}" value="{{get_static_option('home_page_contact_us_section_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_contact_us_section_contact">{{__('Contact No')}}</label>
                                <textarea class="form-control" name="home_page_contact_us_section_contact" placeholder="{{__('Contact No')}}" cols="5" rows="5">{{get_static_option('home_page_contact_us_section_contact')}}</textarea>
                                <small class="form-text text-muted">{{__('Separate item by entering a new line.')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="home_page_contact_us_section_email">{{__('Email')}}</label>
                                <textarea class="form-control" name="home_page_contact_us_section_email" placeholder="{{__('Email')}}" cols="5" rows="5">{{get_static_option('home_page_contact_us_section_email')}}</textarea>
                                <small class="form-text text-muted">{{__('Separate item by entering a new line.')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="home_page_contact_us_section_address">{{__('Address')}}</label>
                                <textarea class="form-control" name="home_page_contact_us_section_address" placeholder="{{__('Email')}}" cols="5" rows="5">{{get_static_option('home_page_contact_us_section_address')}}</textarea>
                                <small class="form-text text-muted">{{__('Separate item by entering a new line.')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="contact_page_map_section_location">{{__('Google Map Location')}}</label>
                                <input type="text" name="contact_page_map_section_location" value="{{get_static_option('contact_page_map_section_location')}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="contact_page_map_section_zoom">{{__('Map Zoom')}}</label>
                                <input type="text" name="contact_page_map_section_zoom" value="{{get_static_option('contact_page_map_section_zoom')}}" class="form-control" >
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-btn.update/>
@endsection