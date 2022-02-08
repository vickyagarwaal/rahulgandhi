@extends('backend.admin-master')
@section('site-title')
    {{__('Header Slider Area')}}
@endsection
@section('style')
<x-media.css/>
<x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">.
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Header Slider Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_header_slider_item"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
                            </div>
                        </div>
                        <x-action.bulk.nav/>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Subtitle')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_header_sliders as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->subtitle}}</td>
                                        <td>
                                            @php $img = get_attachment_image_by_id($data->image,null,true); @endphp
                                            @if (!empty($img))
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="{{$img['img_url']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @php  $img_url = $img['img_url']; @endphp
                                            @endif
                                        </td>
                                        <td>
                                            <x-delete-popover :url="route('admin.home.header.slider.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#header_slider_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 header_slider_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
                                            data-subtitle="{{$data->subtitle}}"
                                            data-btn_txt="{{$data->btn_txt}}"
                                            data-btn_url="{{$data->btn_url}}"
                                            data-btn_status="{{$data->btn_status}}"
                                            data-vdo_btn_txt="{{$data->vdo_btn_txt}}"
                                            data-vdo_btn_url="{{$data->vdo_btn_url}}"
                                            data-vdo_btn_status="{{$data->vdo_btn_status}}"
                                            data-imageid="{{$data->image}}"
                                            data-image="{{$img_url}}"
                                            ><i class="ti-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Infobar Modal -->
    <div class="modal fade" id="add_header_slider_item" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Header Slider Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.home.header.slider')}}"  method="post">
                    <div class="modal-body">@csrf
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="subtitle">{{__('Subtitle')}}</label>
                            <input type="text" name="subtitle" class="form-control" >
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_txt">{{__('Button Text')}}</label>
                                    <input type="text" name="btn_txt" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_url">{{__('Button URL')}}</label>
                                    <input type="text" name="btn_url" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vdo_btn_txt">{{__('Video Button Text')}}</label>
                                    <input type="text" name="vdo_btn_txt" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vdo_btn_url">{{__('Video Button URL')}}</label>
                                    <input type="text" name="vdo_btn_url" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-fields.switch :title="__('Button Status')" :name="'btn_status'" :type="'show'"/>
                            </div>
                            <div class="col-md-6">
                                <x-fields.switch :title="__('Video Button Status')" :name="'vdo_btn_status'" :type="'show'"/>
                            </div>
                        </div>
                        <x-fields.image :title="__('Slider Image')" :name="'image'"  :dimentions="__('1920 x 1080')"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="header_slider_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Header Slider Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.home.header.slider.update')}}"  method="post">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="header_slider_item_id" value="">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="subtitle">{{__('Subtitle')}}</label>
                            <input type="text" name="subtitle" id="edit_subtitle" class="form-control" >
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_txt">{{__('Button Text')}}</label>
                                    <input type="text" name="btn_txt" id="edit_btn_txt" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="btn_url">{{__('Button URL')}}</label>
                                    <input type="text" name="btn_url" id="edit_btn_url" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vdo_btn_txt">{{__('Video Button Text')}}</label>
                                    <input type="text" name="vdo_btn_txt" id="edit_vdo_btn_txt" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vdo_btn_url">{{__('Video Button URL')}}</label>
                                    <input type="text" name="vdo_btn_url" id="edit_vdo_btn_url" class="form-control" >
                                </div>
                            </div>
                        </div>         
                        <div class="row">
                            <div class="col-md-6">
                                <x-fields.switch :title="__('Button Status')" :name="'btn_status'" :btn_id="'edit_btn_status'" :type="'show'"/>
                            </div>
                            <div class="col-md-6">
                                <x-fields.switch :title="__('Video Button Status')" :name="'vdo_btn_status'" :btn_id="'edit_vdo_btn_status'" :type="'show'"/>
                            </div>
                        </div>               
                        <x-fields.image :title="__('Slider Image')" :name="'image'" id="edit_image"  :dimentions="__('1920 x 1080')"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="save" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
<x-datatable.js/>
<x-media.js/>
<x-action.bulk.animate :url="route('admin.home.header.slider.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.header_slider_item_edit_btn',function(){
                    var el = $(this);
                    var form = $('#header_slider_item_edit_modal');
                    form.find('#header_slider_item_id').val(el.data('id'));
                    form.find('#edit_title').val(el.data('title'));
                    form.find('#edit_subtitle').val(el.data('subtitle'));
                    form.find('#edit_btn_txt').val(el.data('btn_txt'));
                    form.find('#edit_btn_url').val(el.data('btn_url'));
                    form.find('#edit_btn_status').val(el.data('btn_status'));
                    form.find('#edit_vdo_btn_txt').val(el.data('vdo_btn_txt'));
                    form.find('#edit_vdo_btn_url').val(el.data('vdo_btn_url'));
                    form.find('#edit_vdo_btn_status').val(el.data('vdo_btn_status'));
                    var image = el.data('image'); 
                    var imageid = el.data('imageid');
                    if(imageid != ''){
                        form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                        form.find('.media-upload-btn-wrapper input').val(imageid);
                        form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                    }
                });
            })
        })(jQuery);
    </script>
@endsection
