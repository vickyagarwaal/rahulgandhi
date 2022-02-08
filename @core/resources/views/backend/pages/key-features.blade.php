@extends('backend.admin-master')
@section('site-title')
    {{__('Key Features Section')}}
@endsection
@section('style')
<x-datatable.css/>
@endsection
@section('content')
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12 mt-t">
            <div class="card">
                <div class="card-body">
                    <x-msg.all/>
                    <div class="header-wrapp">
                        <h4 class="header-title">{{__('Key Features')}}  </h4>
                        <div class="header-title">
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_new_key_features">{{__('Add New Item')}}</button>
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
                                <th>{{__('Title')}}</th>
                                <th>{{__('Icon')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Action')}}</th>
                            </thead>
                            <tbody>
                                @foreach($all_key_features as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-bulk-delete-checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        <td>{{$data->description}}</td>
                                        <td>
                                            <x-delete-popover :url="route('admin.keyfeatures.delete',$data->id)"/>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#key_features_item_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 key_features_edit_btn"
                                               data-id="{{$data->id}}"
                                               data-action="{{route('admin.keyfeatures.update')}}"
                                               data-title="{{$data->title}}"
                                               data-iconFeature="{{$data->icon}}"
                                               data-description="{{$data->description}}"
                                               data-lang="{{$data->lang}}" >
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
<!-- Start Add New Key Features  -->
     <!-- Modal -->
     <div class="modal fade" id="add_new_key_features" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">{{__('New Key Features')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.keyfeatures')}}" id="add_new_key_features_modal_form" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" class="form-control"  id="title"  name="title" placeholder="{{__('Title')}}">
                        </div>
                        <x-icon-picker.field :title="__('Button Icon')" :name="'icon'" :id="'icon'"/>
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>
                            <textarea  id="description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
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
<!-- End Add New Key Features  -->
    <div class="modal fade" id="key_features_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Key Feature Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.keyfeatures.update')}}"  method="post">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="key_features_id" value="">
                        <div class="form-group">
                            <label for="edit_title">{{__('Title')}}</label>
                            <input type="text" class="form-control"  id="edit_title" name="title" placeholder="{{__('Title')}}">
                        </div>
                        <x-icon-picker.field :title="__('Button Icon')" :name="'icon'" :id="'edit_icon'"/>
                        <div class="form-group">
                            <label for="edit_description">{{__('Description')}}</label>
                            <textarea  id="edit_description"  name="description" class="form-control max-height-120" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
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
@endsection
@section('script')
<x-action.bulk.animate :url="route('admin.keyfeatures.bulk.action')"/>
<x-icon-picker.js/>
<x-btn.submit/>
<x-btn.save/>
<x-datatable.js/>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            $(document).on('click','.key_features_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var icon = el.data('icon');
                var description = el.data('description');
                var form = $('#key_features_item_edit_modal');
                form.find('#key_features_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_description').val(description);
                form.find('#edit_icon').val(el.data('iconfeature'));
                form.find('.edit_icon .icp-dd').attr('data-selected',el.data('iconfeature'));
                form.find('.edit_icon .iconpicker-component i').attr('class',el.data('iconfeature'));
            });
        });
                
        })(jQuery);        
    </script>
@endsection
