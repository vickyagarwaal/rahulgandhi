@extends('backend.admin-master')
@section('site-title')
    {{__('Concern Area Settings')}}
@endsection
@section('style')
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__("Concern Area Settings")}}</h4>
                        <form action="{{route('admin.about.concern')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="about_page_concern_section_title">{{__('Title')}}</label>
                                <input type="text" name="about_page_concern_section_title"  class="form-control" value="{{get_static_option('about_page_concern_section_title')}}" >
                            </div>
                            <div class="form-group">
                                <label for="about_page_concern_section_description">{{__('Description')}}</label>
                                <textarea type="text" name="about_page_concern_section_description"  class="form-control" >{{get_static_option('about_page_concern_section_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="about_page_concern_section_name">{{__('Name')}}</label>
                                <input type="text" name="about_page_concern_section_name"  class="form-control" value="{{get_static_option('about_page_concern_section_name')}}" >
                            </div>
                            <div class="form-group">
                                <label for="about_page_concern_section_designation">{{__('Designation')}}</label>
                                <input type="text" name="about_page_concern_section_designation"  class="form-control" value="{{get_static_option('about_page_concern_section_designation')}}" >
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="about_page_concern_section_vdo_btn_url">{{__('Video Button URL')}}</label>
                                        <input type="text" name="about_page_concern_section_vdo_btn_url"  class="form-control" value="{{get_static_option('about_page_concern_section_vdo_btn_url')}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <x-fields.switch :title="__('Video Button Show/Hide')" :name="'about_page_concern_section_vdo_btn_status'" :type="'show'"/>
                                </div>
                                <div class="col-md-4">
                                    <x-icon-picker.field :title="__('Video Button Icon')" :name="'about_page_concern_section_vdo_btn_icon'" :id="'about_page_concern_section_vdo_btn_icon'" :value="'about_page_concern_section_vdo_btn_icon'" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Image')" :name="'about_page_testimonial_section_img'" :dimentions="__('580 x 690')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Sign Image')" :name="'about_page_testimonial_section_sign_img'" :dimentions="__('140 x 40')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Background Image')" :name="'about_page_testimonial_section_bg_img'" :dimentions="__('560 x 540')" />
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
<x-icon-picker.js/>
@endsection

