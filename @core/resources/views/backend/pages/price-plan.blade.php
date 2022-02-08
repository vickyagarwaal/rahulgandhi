@extends('backend.admin-master')
@section('site-title')
    {{__('Price Plan Section')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Price Plan Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_new_price_plan">{{__('Add New Price Plan')}}</button>
                            </div>
                        </div>
                        <x-bulk-action/>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_price_plan as $key => $plan)
                                <li class="nav-$all_price_plan">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            @foreach($all_price_plan as $key => $plan)
                                <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
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
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('Type')}}</th>
                                        <th>{{__('Image')}}</th>
                                        <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($plan as $data)
                                            <tr>
                                                <td>
                                                    <x-bulk-delete-checkbox :id="$data->id"/>
                                                </td>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>{{amount_with_currency_symbol($data->price)}}</td>
                                                <td>{{$data->type}}</td>
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
                                                <td>
                                                    <x-delete-popover :url="route('admin.price.plan.delete',$data->id)"/>
                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#price_plan_item_edit_modal"
                                                       class="btn btn-primary btn-xs mb-3 mr-1 price_plan_edit_btn"
                                                       data-id="{{$data->id}}"
                                                       data-action="{{route('admin.price.plan.update')}}"
                                                       data-title="{{$data->title}}"
                                                       data-type="{{$data->type}}"
                                                       data-price="{{$data->price}}"
                                                       data-features="{{$data->features}}"
                                                       data-btnText="{{$data->btn_text}}"
                                                       data-btnUrl="{{$data->btn_url}}"
                                                       data-edit="{{$data->edit_lang}}"
                                                       data-lang="{{$data->lang}}"
                                                       data-imageid="{{$data->image}}"
                                                       data-image="{{$img_url}}"
                                                    >
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                @php $b++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- Add New Price Plan Modal --}}
             <!-- Modal -->
             <div class="modal fade" id="add_new_price_plan" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title">{{__('New Price Plan')}}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        </div>
                        <form action="{{route('admin.price.plan')}}" id="add_new_price_plan_modal_form" method="post" enctype="multipart/form-data">@csrf
                            <div class="modal-body">
                                <x-add-language/>
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control"  id="title"  name="title" placeholder="{{__('Title')}}">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="price">{{__('Price')}}</label>
                                        <input type="number" class="form-control"  id="price"  name="price" placeholder="{{__('Price')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="type">{{__('Type')}}</label>
                                        <input type="text" class="form-control"  id="type"  name="type" placeholder="{{__('Type')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="btn_text">{{__('Button Text')}}</label>
                                        <input type="text" class="form-control"  id="btn_text"  name="btn_text" placeholder="{{__('Button Text')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="btn_url">{{__('Button URL')}}</label>
                                        <input type="text" class="form-control"  id="btn_url"  name="btn_url" placeholder="{{__('Button URL')}}">
                                        <small class="form-text text-danger">{{__('Please leave it blank if you want to use the default package ordering system')}}</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="features">{{__('Features')}}</label>
                                    <textarea class="form-control"  id="features"  name="features" placeholder="{{__('Features')}}" cols="3" rows="5"></textarea>
                                    <small class="form-text text-muted">{{__('Separate feature by entering a new line.')}}</small> 
                                </div>
                                <div class="form-group">
                                    <label for="image">{{__('Image')}}</label>
                                    <x-image :id="'image'" :name="'image'" :value="'image'"/>
                                    <small class="form-text text-muted">{{__('360 x 160 pixels (recommended)')}}</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="price_plan_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Price Plan Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{ route('admin.price.plan.update') }}" id="price_plan_edit_modal_form"  method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="price_plan_id" value="">
                        <x-edit-language/>
                        <div class="form-group">
                            <label for="edit_title">{{__('Title')}}</label>
                            <input type="text" class="form-control"  id="edit_title"  name="title" placeholder="{{__('Title')}}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="edit_price">{{__('Price')}}</label>
                                <input type="number" class="form-control"  id="edit_price"  name="price" placeholder="{{__('Price')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_type">{{__('Type')}}</label>
                                <input type="text" class="form-control"  id="edit_type"  name="type" placeholder="{{__('Type')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="edit_btn_text">{{__('Button Text')}}</label>
                                <input type="text" class="form-control"  id="edit_btn_text"  name="btn_text" placeholder="{{__('Button Text')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_btn_url">{{__('Button URL')}}</label>
                                <input type="text" class="form-control"  id="edit_btn_url"  name="btn_url" placeholder="{{__('Button URL')}}">
                                <small class="form-text text-danger">{{__('Please leave it blank if you want to use the default package ordering system')}}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_features">{{__('Features')}}</label>
                            <textarea class="form-control"  id="edit_features"  name="features" placeholder="{{__('Features')}}" cols="3" rows="5"></textarea>
                            <small class="form-text text-muted">{{__('Separate feature by entering a new line.')}}</small> 
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <x-image :id="'image'" :name="'image'" :value="'image'"/>
                            <small class="form-text text-muted">{{__('360 x 160 pixels (recommended)')}}</small>
                        </div>
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
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            <x-bulk-action-js :url="route('admin.price.plan.bulk.action')" />
            <x-btn.save/>
            <x-btn.submit/>
            $(document).on('click','.price_plan_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var action = el.data('action');
                var form = $('#price_plan_edit_modal_form');
                form.attr('action',action);
                form.find('#price_plan_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_price').val(el.data('price'));
                form.find('#edit_type').val(el.data('type'));
                form.find('#edit_btn_text').val(el.data('btntext'));
                form.find('#edit_btn_url').val(el.data('btnurl'));
                form.find('#edit_features').val(el.data('features'));
                form.find('#edit_language option[value='+el.data("lang")+']').attr('selected',true);
                var image = el.data('image');
                var imageid = el.data('imageid');
                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });
        });
                
        })(jQuery);        
    </script>
    
@endsection
