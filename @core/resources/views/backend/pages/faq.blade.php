@extends('backend.admin-master')
@section('site-title')
    {{__('Faq Section')}}
@endsection
@section('style')
@include('backend.partials.datatable.style-enqueue')
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Faq Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary pr-4 pl-4" data-toggle="modal" data-target="#add_new_faq">{{__('Add New Faq Items')}}</button>
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
                                            <th>{{__('Description')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                            @foreach($all_faqs as $data)
                                                <tr class="{{$data->id}}">
                                                    <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->title}}</td>
                                                    <td>{{$data->description}} </td>
                                                    <td>
                                                        <x-delete-popover :url="route('admin.faq.delete',$data->id)"/>
                                                        <a href="#"
                                                        data-toggle="modal"
                                                        data-target="#faq_item_edit_modal"
                                                        class="btn btn-primary btn-xs mb-3 mr-1 faq_edit_btn"
                                                        data-action="{{route('admin.faq.update')}}"
                                                        data-id="{{$data->id}}"
                                                        data-title="{{$data->title}}"
                                                        data-description="{{$data->description}}">
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
    <!-- Start Add New Faq  -->
             <!-- Modal -->
             <div class="modal fade" id="add_new_faq" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title">{{__('New Faq')}}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        </div>
                        <form action="{{route('admin.faq')}}" id="add_new_faq_modal_form" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control"  id="title"  name="title" placeholder="{{__('Title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{__('Description')}}</label>
                                    <textarea class="form-control"  id="description" rows="5"  name="description"></textarea>
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
    <!-- End Add New Faq  -->

    <div class="modal fade" id="faq_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Faq Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="faq_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" name="id"  id="faq_id" >
                        <div class="form-group">
                            <label for="edit_title">{{__('Title')}}</label>
                            <input type="text" class="form-control"  id="edit_title"  name="title" placeholder="{{__('Title')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{__('Description')}}</label>
                            <textarea class="form-control"  id="edit_description" rows="5"  name="description"></textarea>
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
@include('backend.partials.datatable.script-enqueue')
<x-action.bulk.animate :url="route('admin.faq.bulk.action')" />
<x-btn.save/>
<x-btn.submit/>
    <script>
        (function($){
        "use strict";
        
        $(document).ready(function () {
            $(document).on('click','.faq_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var form = $('#faq_edit_modal_form');
                var action = el.data('action');
                form.attr('action',action);
                form.find('#edit_description').val(el.data('description'));
                form.find('#faq_id').val(id);
                form.find('#edit_title').val(title);
            });
        });
        })(jQuery);        
    </script>
@endsection
