@extends('backend.admin-master')
@section('site-title')
    {{__('Faq Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Faq Page Settings')}}</h4>
                        <form action="{{route('admin.home.faq')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="faq_page_section_title">{{__('Faq Area Title')}}</label>
                                    <input type="text" class="form-control" name="faq_page_section_title" value="{{get_static_option('faq_page_section_title')}}" placeholder="{{__('Faq Section Title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="faq_page_section_description">{{__('Faq Area Description')}}</label>
                                    <textarea type="text" class="form-control" rows="10" cols="10" name="faq_page_section_description" >{{get_static_option('faq_page_section_description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="faq_page_section_item">{{__('Display Number of Items')}}</label>
                                    <input type="number" class="form-control" name="faq_page_section_item" value="{{get_static_option('faq_page_section_item')}}" >
                                </div>
                            <button type="submit" class="btn btn-primary pr-4 pl-4" id="update">{{__('Update Settings')}}</button>
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