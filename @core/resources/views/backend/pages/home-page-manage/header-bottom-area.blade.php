@extends('backend.admin-master')
@section('site-title')
    {{__('Header Bottom Area')}}
@endsection
@section('style')
<x-media.css/>
<x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Header Bottom Items')}}</h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_header_bottom_item"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
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
                                    @if($home_page_variant_number == '01')
                                    <th>{{__('Icon')}}</th>
                                    @else
                                    <th>{{__('Subtitle')}}</th>
                                    <th>{{__('Image')}}</th>
                                    @endif
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_header_bottom_items as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        @if($home_page_variant_number == '01')
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        @else
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
                                        @endif
                                        <td>
                                            <x-delete-popover :url="route('admin.home.header.bottom.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#header_bottom_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 header_bottom_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
                                            @if($home_page_variant_number == '01')
                                            data-icon="{{$data->icon}}"
                                            @else
                                            data-subtitle="{{$data->subtitle}}"
                                            data-offer_title="{{$data->offer_title}}"
                                            data-offer_price="{{$data->offer_price}}"
                                            data-url="{{$data->url}}"
                                            data-imageid="{{$data->image}}"
                                            data-image="{{$img_url}}"
                                            @endif
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
    <div class="modal fade" id="add_header_bottom_item" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Header bottom Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.home.header.bottom')}}"  method="post">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" >
                        </div>
                        @if($home_page_variant_number == '01')
                        <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'icon'"/>
                        @else
                        <div class="form-group">
                            <label for="subtitle">{{__('Subtitle')}}</label>
                            <input type="text" name="subtitle" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="offer_title">{{__('Offer Title')}}</label>
                            <input type="text" name="offer_title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="offer_price">{{__('Offer Price Details')}}</label>
                            <input type="text" name="offer_price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="url">{{__('URL')}}</label>
                            <input type="text" name="url" class="form-control" >
                        </div>
                        <x-fields.image :title="__('Background Image')" :name="'image'"  :dimentions="__('360 x 230')"/>
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
    <div class="modal fade" id="header_bottom_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Header bottom Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.home.header.bottom.update')}}"  method="post">@csrf
                    <input type="hidden" id="header_bottom_item_id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control" >
                        </div>
                        @if($home_page_variant_number == '01')
                        <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'edit_icon'"/>
                        @else
                        <div class="form-group">
                            <label for="subtitle">{{__('Subtitle')}}</label>
                            <input type="text" name="subtitle" id="edit_subtitle" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="offer_title">{{__('Offer Title')}}</label>
                            <input type="text" name="offer_title" id="edit_offer_title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="offer_price">{{__('Offer Price Details')}}</label>
                            <input type="text" name="offer_price" id="edit_offer_price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="url">{{__('URL')}}</label>
                            <input type="text" name="url" id="edit_url" class="form-control" >
                        </div>
                        <x-fields.image :title="__('Background Image')" :name="'image'"  :dimentions="__('360 x 230')"/>
                        @endif
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
<x-icon-picker.js/>
<x-media.js/>
<x-action.bulk.animate :url="route('admin.home.header.bottom.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.header_bottom_item_edit_btn',function(){
                    var el = $(this);
                    var form = $('#header_bottom_item_edit_modal');
                    form.find('#header_bottom_item_id').val(el.data('id'));
                    form.find('#edit_title').val(el.data('title'));
                    form.find('#edit_subtitle').val(el.data('subtitle'));
                    form.find('#edit_offer_title').val(el.data('offer_title'));
                    form.find('#edit_offer_price').val(el.data('offer_price'));
                    form.find('#edit_url').val(el.data('url'));
                    form.find('#edit_icon').val(el.data('icon'));
                    form.find('.edit_icon .icp-dd').attr('data-selected',el.data('icon'));
                    form.find('.edit_icon .iconpicker-component i').attr('class',el.data('icon'));
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
