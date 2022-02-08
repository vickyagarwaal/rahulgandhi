@extends('backend.admin-master')
@section('site-title')
    {{__('SEO Settings')}}
@endsection
@section('style')
<x-media.css/>
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("SEO Settings")}}</h4>
                        <form action="{{route('admin.general.seo.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="site_meta_tags">{{__('Site Meta Tags')}}</label>
                                <input type="text" name="site_meta_tags"  class="form-control" data-role="tagsinput" value="{{get_static_option('site_meta_tags')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_meta_description">{{__('Site Meta Description')}}</label>
                                <textarea name="site_meta_description"  class="form-control">{{get_static_option('site_meta_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="og_meta_title">{{__('Og Meta Title')}}</label>
                                <input type="text" name="og_meta_title"  class="form-control"  value="{{get_static_option('og_meta_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="og_meta_description">{{__('Og Meta Description')}}</label>
                                <textarea name="og_meta_description"  class="form-control">{{get_static_option('og_meta_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="og_meta_site_name">{{__('Og Meta Site Name')}}</label>
                                <input type="text" name="og_meta_site_name"  class="form-control"  value="{{get_static_option('og_meta_site_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="og_meta_url">{{__('Og Meta URL')}}</label>
                                <input type="text" name="og_meta_url"  class="form-control"  value="{{get_static_option('og_meta_url')}}">
                            </div>
                            <x-fields.image :title="__('Og Meta Image')" :name="'og_meta_image'" :dimentions="__('1200 x 627')" />
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
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
@endsection
