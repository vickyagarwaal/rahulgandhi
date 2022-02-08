@extends('backend.admin-master')
@section('site-title')
    {{__('Testimonial Section')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Testimonial Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_new_testimonial_items">{{__('Add New Item')}}</button>
                            </div>
                        </div>
                        <x-bulk-action/>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    @if($home_page_variant_number != '02')
                                    <th>{{__('Image')}}</th>
                                    @endif
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Designation')}}</th>
                                    <th>{{__('Description')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_testimonials as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        @if($home_page_variant_number != '02')
                                        <td> 
                                            @php
                                            $img = get_attachment_image_by_id($data->image,null,true);
                                            @endphp
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
                                        @endif
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->designation}}</td>
                                        <td>{{Str::words($data->description,10)}}</td>
                                        <td>
                                            <x-delete-popover :url="route('admin.testimonial.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#testimonial_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 testimonial_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-name="{{$data->name}}"
                                            data-description="{{$data->description}}"
                                            data-designation="{{$data->designation}}"
                                            @if($home_page_variant_number != '02')
                                            data-imageid="{{$data->image}}"
                                            data-image="{{$img_url}}">
                                            @endif
                                            <i class="ti-pencil"></i>
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
<div class="modal fade" id="add_new_testimonial_items" aria-hidden="true">
    <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Add Testimonial Item')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.testimonial')}}"  method="post">@csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Designation')}}</label>
                                <input type="text" name="designation" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            @if($home_page_variant_number != '02')
                                <x-fields.image :title="__('Image')" :name="'image'"  :dimentions="__('74 x 74')"/>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
    </div>
</div>
<div class="modal fade" id="testimonial_item_edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Edit Testimonial Item')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.testimonial.update')}}"  method="post">@csrf
                            <input type="hidden" id="testimonial_item_id" name="id">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" name="name" id="edit_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Designation')}}</label>
                                <input type="text" name="designation" id="edit_designation" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea name="description" class="form-control" id="edit_description"></textarea>
                            </div>
                            @if($home_page_variant_number != '02')
                                <x-fields.image :title="__('Image')" :name="'image'"  :dimentions="__('74 x 74')"/>
                            @endif
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                <button type="submit" id="save" class="btn btn-primary">{{__('Save Changes')}}</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<x-media.markup/>
@endsection
@section('script')
<x-media.js/>
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.testimonial.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.testimonial_item_edit_btn',function(){
                    var el = $(this);
                    var form = $('#testimonial_item_edit_modal');
                    form.find('#testimonial_item_id').val(el.data('id'));
                    form.find('#edit_name').val(el.data('name'));
                    form.find('#edit_description').val(el.data('description'));
                    form.find('#edit_designation').val(el.data('designation'));
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
