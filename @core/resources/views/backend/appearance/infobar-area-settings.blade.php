@extends('backend.admin-master')
@section('site-title')
    {{__('Infobar Settings')}}
@endsection
@section('style')
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
                            <h4 class="header-title">{{__('Infobar Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_infobar_item"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
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
                                    <th>{{__('Details')}}</th>
                                    <th>{{__('Icon')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_infobar_items as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->details}}</td>
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        <td>
                                            <x-delete-popover :url="route('admin.infobar.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#infobar_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 infobar_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
                                            data-details="{{$data->details}}"
                                            data-icon="{{$data->icon}}">
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
    <!-- Add Infobar Modal -->
    <div class="modal fade" id="add_infobar_item" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Infobar Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.infobar.settings')}}"  method="post">
                    <div class="modal-body">@csrf
                        <div class="form-group">
                            <label for="social_item_link">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="social_item_link">{{__('Details')}}</label>
                            <input type="text" name="details" class="form-control" >
                        </div>
                        <x-icon-picker.field :title="__('Button Icon')" :name="'icon'" :id="'icon'"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infobar_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Social Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.infobar.update')}}"  method="post">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="infobar_item_id" value="">
                        <div class="form-group">
                            <label for="social_item_link">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="social_item_link">{{__('Details')}}</label>
                            <input type="text" name="details" id="edit_details" class="form-control" >
                        </div>
                        <x-icon-picker.field :title="__('Button Icon')" :name="'icon'" :id="'edit_icon'"/>
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
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.infobar.bulk.action')"/>
<x-icon-picker.js/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.infobar_item_edit_btn',function(){
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var details = el.data('details');
                    var icon = el.data('icon');
                    var form = $('#infobar_item_edit_modal');
                    form.find('#infobar_item_id').val(id);
                    form.find('#edit_title').val(title);
                    form.find('#edit_details').val(details);
                    form.find('#edit_icon').val(icon);
                    form.find('.icp-dd').attr('data-selected',el.data('icon'));
                    form.find('.iconpicker-component i').attr('class',el.data('icon'));
                });
            })
        })(jQuery);
    </script>
@endsection
