@extends('backend.admin-master')
@section('site-title')
    {{__('What We Do Area Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('What We Do Area Area Settings')}}</h4>
                        <form action="{{route('admin.home.what.we.do')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="home_page_what_we_do_section_title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="home_page_what_we_do_section_title" value="{{get_static_option('home_page_what_we_do_section_title')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="home_page_what_we_do_section_description">{{__('Description')}}</label>
                                <textarea name="home_page_what_we_do_section_description" class="form-control" cols="30" rows="5" placeholder="{{__('Description')}}">{{get_static_option('home_page_what_we_do_section_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="home_page_what_we_do_section_display_item_home_{{$home_page_variant_number}}">{{__('Number of Item Display')}}</label>
                                <input type="number" class="form-control" name="home_page_what_we_do_section_display_item_home_{{$home_page_variant_number}}" value="{{get_static_option('home_page_what_we_do_section_display_item_home_'.$home_page_variant_number.'')}}" placeholder="{{__('Number of Item Display')}}">
                            </div>
                            <button type="submit" id="update" class="btn btn-primary pr-4 pl-4">{{__('Update Settings')}}</button>
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