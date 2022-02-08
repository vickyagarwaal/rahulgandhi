@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/colorpicker.css')}}">
    
@endsection
@section('site-title')
    {{__('Service Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Service Page Settings")}}</h4>
                        <form action="{{route('admin.services.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="service_page_counterup_section_status"><strong>{{__('Counterup Section Show/Hide')}}</strong></label>
                                <label class="switch">
                                <input type="checkbox" name="service_page_counterup_section_status"  @if(!empty(get_static_option('service_page_counterup_section_status'))) checked @endif id="service_page_counterup_section_status">
                                    <span class="slider"></span>
                                </label>
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
@endsection