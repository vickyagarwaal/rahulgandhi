@extends('backend.admin-master')
@section('site-title')
    {{__('Site Identity')}}
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
                        <h4 class="header-title">{{__("Site Identity Settings")}}</h4>
                        <form action="{{route('admin.general.site.identity')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Site Favicon')" :name="'site_favicon'" :dimentions="__('60 x 60')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Site Logo')" :name="'site_logo'" :dimentions="__('160 x 50')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Site White  Logo')" :name="'site_white_logo'" :dimentions="__('160 x 50')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Breadcrumb Background')" :name="'site_breadcrumb_img'" :dimentions="__('160 x 50')" />
                                </div>
                                <div class="col-md-3">
                                    <x-fields.image :title="__('Footer Background')" :name="'site_footer_img'" :dimentions="__('160 x 50')" />
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