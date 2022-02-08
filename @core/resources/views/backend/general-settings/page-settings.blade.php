@extends('backend.admin-master')
@section('site-title')
    {{__('Page Settings')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Page Name & Slug Settings")}}</h4>
                        <form action="{{route('admin.general.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    @php
                                        $pages_list = \App\MenuBuilder\MenuBuilderSetup::Instance()->static_pages_list();
                                    @endphp
                                    @foreach($pages_list as $page)
                                        <div class="from-group">
                                            <label for="{{$page}}_page_slug">{{__(ucfirst(str_replace('_',' ',$page)))}} {{__('Page Slug')}}</label>
                                            <input type="text" class="form-control" value="{{get_static_option($page.'_page_slug')}}" name="{{$page}}_page_slug" placeholder="{{__('Slug')}}" >
                                            <small>{{__('slug example:')}} {{$page}}</small>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    <div class="accordion-wrapper">
                                        <div id="accordion-PAGE-SETTINGS">
                                            @foreach($pages_list as $page)
                                                <div class="card">
                                                    <div class="card-header" >
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$page}}_page_PAGE_SETTINGS" aria-expanded="true" >
                                                                <span class="page-title">@if(!empty(get_static_option($page.'_page_name'))) {{get_static_option($page.'_page_name')}} @else {{__(ucfirst(str_replace('_',' ',$page)))}}  @endif</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="{{$page}}_page_PAGE_SETTINGS" class="collapse"  data-parent="#accordion-PAGE-SETTINGS">
                                                        <div class="card-body">
                                                            <div class="from-group">
                                                                <label for="{{$page}}_page_name">{{__('Name')}}</label>
                                                                <input type="text" class="form-control" name="{{$page}}_page_name" value="{{get_static_option($page.'_page_name') ?? ucfirst(str_replace(['_','-'],[' ',' '],$page))}}"  placeholder="{{__('Name')}}" >
                                                            </div>
                                                            <div class="form-group margin-top-20">
                                                                <label for="{{$page}}_page_meta_tags">{{__('Meta Tags')}}</label>
                                                                <input type="text" name="{{$page}}_page_meta_tags"  class="form-control" data-role="tagsinput" value="{{get_static_option($page.'_page_meta_tags')}}" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="about_page_meta_description">{{__('Meta Description')}}</label>
                                                                <textarea name="{{$page}}_page_meta_description"  class="form-control" rows="5" >{{get_static_option($page.'_page_meta_description')}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-btn.update/>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script>
         (function($){
        "use strict";
        $(document).ready(function () {
            $('.page-name').on('bind','change paste keyup',function (e) {
                        $(this).parent().parent().parent().prev().find('.page-title').text($(this).val());
                    })
        });
        })(jQuery);
    </script>
@endsection
