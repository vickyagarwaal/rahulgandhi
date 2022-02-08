@extends('backend.admin-master')
@section('site-title')
    {{__('Expert Area Settings')}}
@endsection
@section('style')
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Expert Area Area Settings')}}</h4>
                        <form action="{{route('admin.home.expert.area')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="home_page_expert_section_title">{{__('Title')}}</label>
                                        <input type="text" class="form-control" name="home_page_expert_section_title" value="{{get_static_option('home_page_expert_section_title')}}" placeholder="{{__('Title')}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <x-fields.image :title="__('Background Image')" :name="'home_page_expert_section_bg'" :dimentions="__('380 x 500')" />
                                        </div>
                                        <div class="col-lg-6">
                                            <x-icon-picker.field :title="__('Icon')" :name="'home_page_expert_section_icon'" :id="'home_page_expert_section_icon'" :value="'home_page_expert_section_icon'"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_expert_section_support_title">{{__('Support Area Title')}}</label>
                                        <input type="text" class="form-control"  id="home_page_expert_section_support_title" value="{{get_static_option('home_page_expert_section_support_title')}}" name="home_page_expert_section_support_title" placeholder="{{__('Support Area Title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_expert_section_support_details">{{__('Support Area Details')}}</label>
                                        <input type="text" class="form-control"  id="home_page_expert_section_support_details" value="{{get_static_option('home_page_expert_section_support_details')}}" name="home_page_expert_section_support_details" placeholder="{{__('Support Area Details')}}">
                                    </div>
                                    <x-icon-picker.field :title="__('Support Area Icon')" :name="'home_page_expert_section_support_icon'" :id="'home_page_expert_section_support_icon'" :value="'home_page_expert_section_support_icon'"/>
                                </div>
                                <div class="col-lg-6">
                                    @for($i = 1 ; $i < 3 ; $i++)
                                    <div class="form-group">
                                        <label for="home_page_expert_section_title">{{__('Key Feature '.$i)}}</label>
                                        <input type="text" class="form-control" name="home_page_expert_section_title_{{$i}}" value="{{get_static_option('home_page_expert_section_title_'.$i)}}" placeholder="{{__('Enter Title')}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-fields.image :title="__('Background Image '.$i)" :name="'home_page_expert_section_bg_'.$i" :dimentions="__('230 x 400')" />
                                        </div>
                                        <div class="col-md-6">
                                            <x-icon-picker.field :title="__('Support Area Icon '.$i)" :name="'home_page_expert_section_support_icon_'.$i" :id="'home_page_expert_section_support_icon_'.$i" :value="'home_page_expert_section_support_icon_'.$i"/>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                            <button type="submit" id="update" class="btn btn-primary pr-4 pl-4">{{__('Update Settings')}}</button>
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