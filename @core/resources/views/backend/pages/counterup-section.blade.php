@extends('backend.admin-master')
@section('site-title')
    {{__('Counterup Items')}}
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
                            <h4 class="header-title">{{__('Counterup Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#counterup_item_add_modal">{{__('Add New Item')}}</button>
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
                                    <th>{{__('Number')}}</th>
                                    <th>{{__('Extra Text')}}</th>
                                    <th>{{__('Icon')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_counterups as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->number}}</td>
                                        <td>{{$data->extra_text}}</td>
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        <td>
                                            <x-delete-popover :url="route('admin.counterup.delete',$data->id)"/>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#counterup_item_edit_modal"
                                               class="btn btn-lg btn-primary btn-sm mb-3 mr-1 counterup_edit_btn"
                                               data-id="{{$data->id}}"
                                               data-title="{{$data->title}}"
                                               data-number="{{$data->number}}"
                                               data-lang="{{$data->lang}}"
                                               data-icon="{{$data->icon}}"
                                               data-extra_text="{{$data->extra_text}}">
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
<div class="modal fade" id="counterup_item_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Add counterup Item')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('admin.counterup')}}"  method="post">@csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control"  id="title"  name="title" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="number">{{__('Number')}}</label>
                                <input type="float" class="form-control"  id="number"  name="number" placeholder="{{__('Number')}}">
                            </div>
                            <div class="form-group">
                                <label for="extra_text">{{__('Extra Text')}}</label>
                                <input type="text" class="form-control"  id="extra_text"  name="extra_text" placeholder="{{__('Extra Text')}}">
                            </div>
                            <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'icon'"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
<div class="modal fade" id="counterup_item_edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Edit counterup Item')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.counterup.update')}}"  method="post">@csrf
                    <input type="hidden" name="id" id="counterup_item_id" value="">
                    <div class="form-group">
                        <label for="edit_title">{{__('Title')}}</label>
                        <input type="text" class="form-control"  id="edit_title" name="title" placeholder="{{__('Title')}}">
                    </div>
                    <div class="form-group">
                        <label for="edit_number">{{__('Number')}}</label>
                        <input type="float" class="form-control"  id="edit_number"  name="number" placeholder="{{__('Number')}}">
                    </div>
                    <div class="form-group">
                        <label for="edit_extra_text">{{__('Extra Text')}}</label>
                        <input type="text" class="form-control"  id="edit_extra_text"  name="extra_text" placeholder="{{__('Extra Text')}}">
                    </div>
                    <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'edit_icon'"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="save" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<x-datatable.js/>
<x-icon-picker.js/>
<x-action.bulk.animate :url="route('admin.counterup.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.counterup_edit_btn',function(){
                    var el = $(this);
                    var form = $('#counterup_item_edit_modal');
                    form.find('#counterup_item_id').val(el.data('id'));
                    form.find('#edit_title').val(el.data('title'));
                    form.find('#edit_number').val(el.data('number'));
                    form.find('#edit_extra_text').val(el.data('extra_text'));
                    form.find('#edit_icon').val(el.data('icon'));
                    form.find('.edit_icon .icp-dd').attr('data-selected',el.data('icon'));
                    form.find('.edit_icon .iconpicker-component i').attr('class',el.data('icon'));
                });
            })
        })(jQuery);
    </script>
@endsection
