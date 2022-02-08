@extends('backend.admin-master')
@section('site-title')
    {{__('Image Gallery Page Settings')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Image Gallery Page Settings")}}</h4>
                        <form action="{{route('admin.gallery.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="site_image_gallery_post_items">{{__('Display Number of Items')}}</label>
                                <input type="number" class="form-control" name="site_image_gallery_post_items" value="{{get_static_option('site_image_gallery_post_items')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_title">{{__('Image Gallery Title')}}</label>
                                <input type="text" class="form-control" name="site_image_gallery_title" value="{{get_static_option('site_image_gallery_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_image_gallery_description">{{__('Image Gallery Description')}}</label>
                                <input type="text" class="form-control" name="site_image_gallery_description" value="{{get_static_option('site_image_gallery_description')}}">
                            </div>
                            @if($home_page_variant_number == '01')
                            <x-fields.image :title="__('Background Image')" :name="'site_image_gallery_bg_img'"  :dimentions="__('1920 x 1080')"/>
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
<x-btn.update/>
<x-media.js/>
@endsection
