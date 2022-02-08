@extends('backend.admin-master')
@section('site-title')
    {{__('Medical Care Info Area')}}
@endsection
@section('style')
<x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-3"><x-msg.all/></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Medical Care Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_medical_care_item"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
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
                                    <th>{{__('Icon')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_medical_care_items as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        <td>
                                            <x-delete-popover :url="route('admin.medical.care.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#medical_care_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 medical_care_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Opening Hours Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_opening_hour_item"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
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
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_opening_hour_items as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->details}}</td>
                                        <td>
                                            <x-delete-popover :url="route('admin.medical.care.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#opening_hour_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 opening_hour_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
                                            data-details="{{$data->details}}">
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
    <!-- Start Medical Care Modal -->
    <div class="modal fade" id="add_medical_care_item" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Medical Care Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.medical.care')}}"  method="post">@csrf
                    <input type="hidden" name="type" value="medical_care">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" >
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
    <div class="modal fade" id="medical_care_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Medical Care Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.medical.care.update')}}"  method="post">@csrf
                    <input type="hidden" id="medical_care_item_id" name="id">
                    <input type="hidden" name="type" value="medical_care">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control" >
                        </div>
                        <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'edit_icon'"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="save" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Medical Care Modal -->
    <!-- Start Opening Hours Modal -->
    <div class="modal fade" id="add_opening_hour_item" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Opening Hours Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.medical.care')}}"  method="post">@csrf
                    <input type="hidden" name="type" value="opening_hour">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="details">{{__('Details')}}</label>
                            <textarea name="details" class="form-control"></textarea>
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
    <div class="modal fade" id="opening_hour_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Opening Hours Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.medical.care.update')}}"  method="post">@csrf
                    <input type="hidden" id="opening_hour_item_id" name="id">
                    <input type="hidden" name="type" value="opening_hour">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="details">{{__('Details')}}</label>
                            <textarea name="details" id="edit_details" class="form-control"></textarea>
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
    <!-- End Opening Hours Modal -->
@endsection
@section('script')
<x-datatable.js/>
<x-icon-picker.js/>
<x-action.bulk.animate :url="route('admin.medical.care.bulk.action')"/>
<x-action.bulk.animate :url="route('admin.medical.care.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.medical_care_item_edit_btn',function(){
                    var el = $(this);
                    var form = $('#medical_care_item_edit_modal');
                    form.find('#medical_care_item_id').val(el.data('id'));
                    form.find('#edit_title').val(el.data('title'));
                    form.find('#edit_icon').val(el.data('icon'));
                    form.find('.edit_icon .icp-dd').attr('data-selected',el.data('icon'));
                    form.find('.edit_icon .iconpicker-component i').attr('class',el.data('icon'));
                });
                $(document).on('click','.opening_hour_item_edit_btn',function(){
                    var el = $(this);
                    var form = $('#opening_hour_item_edit_modal');
                    form.find('#opening_hour_item_id').val(el.data('id'));
                    form.find('#edit_title').val(el.data('title'));
                    form.find('#edit_details').val(el.data('details'));
                });
            })
        })(jQuery);
    </script>
@endsection
