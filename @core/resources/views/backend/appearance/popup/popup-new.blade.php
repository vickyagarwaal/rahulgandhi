@extends('backend.admin-master')
@section('site-title')
    {{__('New Popup')}}
@endsection
@section('style')
<x-media.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Add New Popup')}}  </h4>
                            <h4 class="header-title">
                                <a href="{{route('admin.popup.builder.all')}}" class="btn btn-primary mt-4 pr-4 pl-4">{{__('All Popup')}}</a>
                            </h4>
                        </div>
                        <form action="{{route('admin.popup.builder.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name ( It will not show in frontend )')}}</label>
                                        <input type="text" class="form-control"  id="name" name="name" value="{{old('name')}}" placeholder="{{__('Name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type"><strong>{{__('Type')}}</strong></label>
                                        <select name="type" id="popup_type" class="form-control">
                                                <option value="notice">{{__('Notice')}}</option>
                                                <option value="only_image">{{__('Only Image')}}</option>
                                                <option value="promotion">{{__('Promotion')}}</option>
                                                <option value="discount">{{__('Discount')}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{__('Description')}}</label>
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="offer_time_end">{{__('Offer End Date')}}</label>
                                        <input type="date" class="form-control datepicker"  id="offer_time_end" name="offer_time_end" placeholder="{{__('offer end date')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="btn_status"><strong>{{__('Button Show/Hide')}}</strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="btn_status" id="btn_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="button_text">{{__('Button Text')}}</label>
                                        <input type="text" class="form-control"  id="button_text" name="button_text" value="{{old('button_text')}}" placeholder="{{__('Button Text')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="button_link">{{__('Button Link')}}</label>
                                        <input type="text" class="form-control"  id="button_link" name="button_link" value="{{old('button_link')}}" placeholder="{{__('Button Link')}}">
                                    </div>
                                    <x-fields.image :title="__('Image')" :name="'background_image'" :dimentions="__('700 x 400')" />
                                    <x-fields.image :title="__('Background Image')" :name="'image'" :dimentions="__('700 x 400')" />
                                    <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                                </div>
                            </div>
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
<x-btn.submit/>
    <script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            showHideFields($('#popup_type').val());
            $(document).on('change','#popup_type',function (e) {
                e.preventDefault();
                var el = $(this);
                var type = el.val();
                showHideFields(type);
            });
            function showHideFields(type) {
                if(type == 'notice'){
                    $('label[for="image"]').parent().hide();
                    $('label[for="description"]').parent().show();
                    $('label[for="title"]').parent().show();
                    $('label[for="background_image"]').parent().hide();
                    $('label[for="button_text"]').parent().hide();
                    $('label[for="button_link"]').parent().hide();
                    $('label[for="btn_status"]').parent().hide();
                    $('label[for="offer_time_end"]').parent().hide();

                }else if(type == 'only_image'){
                    $('label[for="image"]').parent().show();
                    $('label[for="background_image"]').parent().hide();
                    $('label[for="button_text"]').parent().hide();
                    $('label[for="button_link"]').parent().hide();
                    $('label[for="btn_status"]').parent().hide();
                    $('label[for="offer_time_end"]').parent().hide();
                    $('label[for="description"]').parent().hide();
                    $('label[for="title"]').parent().hide();
                }else if(type == 'promotion'){
                    $('label[for="image"]').parent().show();
                    $('label[for="background_image"]').parent().show();
                    $('label[for="button_text"]').parent().show();
                    $('label[for="button_link"]').parent().show();
                    $('label[for="btn_status"]').parent().show();
                    $('label[for="offer_time_end"]').parent().hide();
                    $('label[for="description"]').parent().show();
                    $('label[for="title"]').parent().show();
                }else{
                    $('label[for="image"]').parent().show();
                    $('label[for="background_image"]').parent().show();
                    $('label[for="button_text"]').parent().show();
                    $('label[for="button_link"]').parent().show();
                    $('label[for="btn_status"]').parent().show();
                    $('label[for="offer_time_end"]').parent().show();
                    $('label[for="description"]').parent().show();
                    $('label[for="title"]').parent().show();
                }
            }
        });
        })(jQuery);
    </script>
@endsection
