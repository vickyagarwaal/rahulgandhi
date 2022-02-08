@extends('backend.admin-master')
@section('site-title')
    {{__('Blog Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Blog Page Settings')}}</h4>
                        <form action="{{route('admin.blog.page')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="blog_page_item">{{__('Display Number of Post Item')}}</label>
                                <input type="number" class="form-control"  id="blog_page_item" value="{{get_static_option('blog_page_item')}}" name="blog_page_item" placeholder="{{__('Post Item')}}">
                                <small class="text-danger text-muted">{{__('enter how many post you want to show in Blog Page')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="blog_page_counterup_section_status"><strong>{{__('Counterup Section Show/Hide')}}</strong></label>
                                <label class="switch">
                                <input type="checkbox" name="blog_page_counterup_section_status"  @if(!empty(get_static_option('blog_page_counterup_section_status'))) checked @endif id="blog_page_counterup_section_status">
                                    <span class="slider"></span>
                                </label>
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