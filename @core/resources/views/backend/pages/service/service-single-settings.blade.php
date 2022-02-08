@extends('backend.admin-master')
@section('site-title')
    {{__('Service Single Settings')}}
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
                        <h4 class="header-title">{{__("Service Single Settings")}}</h4>
                        <form action="{{route('admin.services.single.page.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="service_single_page_counterup_section_status"><strong>{{__('Counterup Section Show/Hide')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="service_single_page_counterup_section_status"  @if(!empty(get_static_option('service_single_page_counterup_section_status'))) checked @endif id="service_single_page_counterup_section_status">
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
    <x-media.markup/>
@endsection
@section('script')
<x-media.js/>
<x-icon-picker.js/>
<x-btn.update/>
@endsection