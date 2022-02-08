@extends('backend.admin-master')
@section('site-title')
{{__('Products Category')}}
@endsection
@section('style')
   <x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('All Products Categories')}}</h4>
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
                                <th>{{__('Category Level')}}</th>
                                <th>{{__('Parent Category')}}</th>
                                <th>{{__('Icon')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_category as $data)
                                    <tr id="{{$data->id}}">
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name ?? __('Untitled')}}</td>
                                        @if($data->parent_id == '0')
                                        <td><span class="badge badge-danger " >{{__('Main')}}</span></td>
                                        @else
                                        <td><span class="badge badge-info" >{{__('Sub')}}</span></td>
                                        @endif
                                        @if($data->parent_id == '0')
                                        <td>{{__('None')}}</td>
                                        @else
                                        <td>@php $parent_cat_name = App\ProductCategory::find($data->parent_id)->name;@endphp
                                            {{$parent_cat_name}}
                                        </td>
                                        @endif
                                        <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                        <td>
                                           <x-status-span :status="$data->status"/>
                                        </td>
                                        <td>
                                            <x-delete-popover :url="route('admin.products.category.delete',$data->id)"/>
                                            <a href="#"
                                               data-toggle="modal"
                                               data-target="#category_edit_modal"
                                               class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                               data-id="{{$data->id}}"
                                               data-status="{{$data->status}}"
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
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Add New Category')}}</h4>
                        <form action="{{route('admin.products.category.new')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}">
                            </div>
                            <x-icon-picker.field :title="__('Icon')" :name="'icon'" :id="'icon'"/>
                            <div class="form-group">
                                  <label for="">{{__('Select Category Level')}}</label>
                                  <select class="form-control" name="category_level" id="category_level">
                                    <option value="main">{{__('Main Category')}}</option>
                                    <option value="sub">{{__('Sub Category')}}</option>
                                  </select>
                            </div>
                            <div id="AppendParentCategory">
                                
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')" />
                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                        </form>
                    </div>
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
                <form action="{{route('admin.products.category.update')}}"  method="post">@csrf
                    <input type="hidden" name="id" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select name="status" class="form-control" >
                                <option value="publish">{{__("Publish")}}</option>
                                <option value="draft">{{__("Draft")}}</option>
                            </select>
                        </div>
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
<x-action.bulk.animate :url="route('admin.products.category.bulk.action')"/>
 <x-btn.submit/>
 <x-btn.save/>
 <x-icon-picker.js/>
    <script>
        (function ($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.category_edit_btn',function(){
                    var el = $(this);
                    var id = el.data('id');
                    var status = el.data('status');
                    var modal = $('#category_edit_modal');
                    modal.find('input[name="id"]').val(id);
                });
                $(document).on('change','#category_level',function(){
                    var category_level = $(this).val();
                    $.ajax({
                        type:'GET',
                        url:  '{{route("admin.products.category.info")}}',
                        data: {category_level:category_level},
                        success: function(resp){
                        $("#AppendParentCategory").html(resp.view);
                        },error: function(){
                            console.log("Error");
                    }
                });
                });
            });
        })(jQuery)
    </script>
    <x-datatable.js/>
@endsection
