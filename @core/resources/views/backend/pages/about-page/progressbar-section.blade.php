@extends('backend.admin-master')
@section('site-title')
    {{__('Progressbar Settings')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="margin-top-30">
            <x-msg.all/>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Progressbar Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_progressbar">{{__('Add New Item')}}</button>
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
                                <th>{{__('Progress')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_progressbar as $data)
                                    <tr class="{{$data->id}}">
                                            <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->title}}</td>
                                            <td>{{$data->progress}}</td>
                                            <td>
                                                <x-action.delete :url="route('admin.progressbar.delete',$data->id)"/>
                                                <a href="#"
                                                data-toggle="modal"
                                                data-target="#social_item_edit_modal"
                                                class="btn btn-lg btn-primary btn-sm mb-3 mr-1 social_item_edit_btn"
                                                data-id="{{$data->id}}"
                                                data-title="{{$data->title}}"
                                                data-progress="{{$data->progress}}">
                                                    <i class="ti-pencil"></i></a>
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
                        <h4 class="header-title">{{__('Progressbar Settings')}}</h4>
                        <form action="{{route('admin.about.progressbar')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="about_page_progressbar_section_title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="about_page_progressbar_section_title" value="{{get_static_option('about_page_progressbar_section_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="about_page_progressbar_section_description">{{__('Description')}}</label>
                                <textarea class="form-control" name="about_page_progressbar_section_description" >{{get_static_option('about_page_progressbar_section_description')}}</textarea>
                            </div>
                            <x-fields.image :title="__('Background Image')" :name="'about_page_progressbar_section_bg'"  :dimentions="__('950 x 1000')"/>
                            <button type="submit" id="update" class="btn btn-primary pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social Icon Modal -->
    <div class="modal fade" id="add_progressbar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Social Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.progressbar')}}"  method="post">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="title"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Progress')}}</label>
                            <input type="number" name="progress" id="progress" class="form-control" min="0" max="100">
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
    <div class="modal fade" id="social_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Social Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.progressbar.update')}}"  method="post">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="progressbar" value="">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="title">{{__('Progress')}}</label>
                            <input type="number" name="progress" id="edit_progress"  class="form-control" min="0" max="100">
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
<x-btn.save/>
<x-btn.submit/>
<x-btn.update/>
<x-action.bulk.animate :url="route('admin.progressbar.bulk.action')" />
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $(document).on('click','.social_item_edit_btn',function(){
                    var el = $(this);
                    var id = el.data('id');
                    var title = el.data('title');
                    var progress = el.data('progress');
                    var form = $('#social_item_edit_modal');
                    form.find('#progressbar').val(id);
                    form.find('#edit_title').val(title);
                    form.find('#edit_progress').val(progress);
                });
            })
        })(jQuery);
    </script>
@endsection
