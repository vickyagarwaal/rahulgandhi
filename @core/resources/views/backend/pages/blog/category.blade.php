@extends('backend.admin-master')
@section('site-title')
    {{__('Blog Category')}}
@endsection
@section('style')
   <x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Blog Categories')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_modal"> <i class="fa fa-plus" aria-hidden="true"></i> {{__('Add New Category')}}</button>
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
                                <th>{{__('Name')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_category as $data)
                                    <tr class="{{$data->id}}">
                                        <td>{{$data->id}}</td>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->name ?? __('Untitled')}}</td>
                                        <td>
                                           <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            <x-delete-popover :url="route('admin.blog.category.delete',$data->id)"/>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#category_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                               data-id="{{$data->id}}"
                                               data-name="{{$data->name}}"
                                               data-status="{{$data->status}}">
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
    <div class="modal fade" id="add_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add New Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.blog.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <x-fields.status :name="'status'" :title="__('Status')" />
                        <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="category_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.blog.category.update')}}" method="post">@csrf
                    <input type="hidden" name="id" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" id="edit_name" class="form-control">
                        </div>
                        <x-fields.status :name="'status'" :title="__('Status')" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="save" class="btn btn-primary">{{__('Save Change')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<x-datatable.js/>
<x-btn.submit/>
<x-btn.save/>
<x-action.bulk.animate :url="route('admin.blog.category.bulk.action')"/>
    <script>
        (function ($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.category_edit_btn',function(){
                    var el = $(this);
                    var id = el.data('id');
                    var name = el.data('name');
                    var status = el.data('status');
                    var modal = $('#category_edit_modal');
                    modal.find('input[name="id"]').val(id);
                    modal.find('#edit_name').val(name);
                    modal.find('select[name="status"] option[value="'+status+'"]').prop('selected',true);
                });
            });
        })(jQuery)
    </script>

   
@endsection
