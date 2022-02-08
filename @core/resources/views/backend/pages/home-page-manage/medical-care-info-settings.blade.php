@extends('backend.admin-master')
@section('site-title')
    {{__('Medical Care Info Settings')}}
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
                        <h4 class="header-title">{{__("Medical Care Info Settings")}}</h4>
                        <form action="{{route('admin.home.medical.care')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_medical_care_section_info_title">{{__('Medical Care Title')}}</label>
                                <input type="text" name="home_page_medical_care_section_info_title"  class="form-control" value="{{get_static_option('home_page_medical_care_section_info_title')}}" >
                            </div>
                            <div class="form-group"> 
                                <label for="home_page_medical_care_section_info_details">{{__('Medical Care Details')}}</label>
                                <textarea type="text" name="home_page_medical_care_section_info_details"  class="form-control" >{{get_static_option('home_page_medical_care_section_info_details')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="home_page_medical_care_section_opening_hour_title">{{__('Opening Hour Title')}}</label>
                                <input type="text" name="home_page_medical_care_section_opening_hour_title"  class="form-control" value="{{get_static_option('home_page_medical_care_section_opening_hour_title')}}" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_medical_care_section_appointment_title">{{__('Appointment Title')}}</label>
                                <input type="text" name="home_page_medical_care_section_appointment_title"  class="form-control" value="{{get_static_option('home_page_medical_care_section_appointment_title')}}" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_medical_care_section_appointment_button_text">{{__('Appointment Button Text')}}</label>
                                <input type="text" name="home_page_medical_care_section_appointment_button_text"  class="form-control" value="{{get_static_option('home_page_medical_care_section_appointment_button_text')}}" >
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Opening Hour Background Image')" :name="'home_page_medical_care_section_opening_bg'" :dimentions="__('380 x 500')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Appointment Background Image')" :name="'home_page_medical_care_section_appointment_bg'" :dimentions="__('380 x 450')" />
                                </div>
                            </div>
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
@endsection
