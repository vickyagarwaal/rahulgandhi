@extends('backend.admin-master')
@section('site-title')
    {{__('Testimonial Area Settings')}}
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
                        <h4 class="header-title">{{__("Testimonial Area Settings")}}</h4>
                        <form action="{{route('admin.home.testimonial')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_testimonial_section_title">{{__('Title')}}</label>
                                <input type="text" name="home_page_testimonial_section_title"  class="form-control" value="{{get_static_option('home_page_testimonial_section_title')}}" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_testimonial_section_home_{{$home_page_variant_number}}_display_items">{{__('Display Number Of Items')}}</label>
                                <input type="text" name="home_page_testimonial_section_home_{{$home_page_variant_number}}_display_items"  class="form-control" value="{{get_static_option('home_page_testimonial_section_home_'.$home_page_variant_number.'_display_items')}}" >
                            </div>
                            @if($home_page_variant_number == '02')
                            <x-fields.image :title="__('Background Image')" :name="'home_page_testimonial_section_bg_var2'" :dimentions="__('2992 x 2608')" />
                            @else
                            <x-fields.image :title="__('Background Image')" :name="'home_page_testimonial_section_bg_var1'" :dimentions="__('1920 x 1260')" />
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
@endsection

