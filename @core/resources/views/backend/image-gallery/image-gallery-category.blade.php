@extends('backend.admin-master')
@section('site-title')
    {{__('Image Gallery Categories')}}
@endsection
@section('style')
<x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Image Gallery Categories')}}</h4>
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
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_gallery_images as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td><x-action.status :status="$data->status"/></td>
                                        <td>
                                            <x-delete-popover :url="route('admin.gallery.category.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#image_category_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 category_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-name="{{$data->title}}"
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
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Add New Category')}}</h4>
                        <form action="{{route('admin.gallery.category.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')" />
                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="image_category_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.gallery.category.update')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <x-fields.status :name="'status'" :title="__('Status')" />
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
<x-action.bulk.animate :url="route('admin.gallery.category.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        $(document).ready(function () {
            $(document).on('click','.category_edit_btn',function (){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('name');
                var status = el.data('status');
                var modalContainerId = $('#image_category_item_edit_modal');
                modalContainerId.find('input[name="id"]').val(id);
                modalContainerId.find('input[name="title"]').val(title);
                modalContainerId.find('select[name="status"] option[value="'+status+'"]').attr('selected',true);
            });
        });
    </script>
@endsection
