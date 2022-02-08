@extends('backend.admin-master')
@section('style')
<x-datatable.css/>
@endsection
@section('site-title')
    {{__('Top Bar Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Support Info Items')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_support_info"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
                            </div>
                        </div>
                        <x-action.bulk.nav/>
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
                                @foreach($all_topbar_infos as $data)
                                <tr class="{{$data->id}}">
                                    <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                    <td>
                                        <x-delete-popover :url="route('admin.topbar.info.delete',$data->id)"/>
                                        <a href="#"
                                           data-toggle="modal"
                                           data-target="#support_info_item_edit_modal"
                                           class="btn btn-primary btn-xs mb-3 mr-1 support_info_edit_btn"
                                           data-id="{{$data->id}}"
                                           data-action="{{route('admin.topbar.info.update')}}"
                                           data-details="{{$data->details}}"
                                           data-iconSupport="{{$data->icon}}"
                                           data-lang="{{$data->lang}}">
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
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Social Icons')}}  </h4>
                            <div class="header-title">
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#add_social_icon"><i class="fas fa-plus mr-1"></i> {{__('Add New')}}</button>
                            </div>
                        </div>
                        <table class="table table-default">
                            <thead>
                            <th>{{__('ID')}}</th>
                            <th>{{__('Icon')}}</th>
                            <th>{{__('URL')}}</th>
                            <th>{{__('Action')}}</th>
                            </thead>
                            <tbody>
                            @foreach($all_social_icons as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td class="icon-view"><i class="{{$data->icon}}"></i></td>
                                    <td>{{$data->url}}</td>
                                    <td>
                                        <x-delete-popover :url="route('admin.topbar.icon.delete',$data->id)"/>
                                        <a  href="#" 
                                            data-toggle="modal"
                                            data-target="#social_item_edit_modal"
                                            class="btn btn-primary btn-xs mb-3 mr-1 social_item_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-url="{{$data->url}}"
                                            data-iconSocial="{{$data->icon}}">
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
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Choose Topbar Variant')}}  </h4>
                        <form action="{{route('admin.topbar.variant')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control"  id="topbar_variant" value="{{get_static_option('topbar_variant_home_'.$home_page_variant_number)}}" name="topbar_variant_home_{{$home_page_variant_number}}">
                            </div>
                            <div class="row">
                                @for($i = 1; $i < 4; $i++)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="img-select selected">
                                            <div class="img-wrap">
                                                <img src="{{asset('assets/frontend/variants/topbar/topbar-variant-0'.$i.'.png')}}" data-home_id="0{{$i}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    @if(get_static_option('topbar_variant_home_'.$home_page_variant_number) == '01' && $i == 1)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="topbar_btn_txt">{{__('Button Text')}}</label>
                                                    <input type="text" name="topbar_btn_txt"  class="form-control" value="{{get_static_option('topbar_btn_txt')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="topbar_btn_url">{{__('Button URL')}}</label>
                                                    <input type="text" name="topbar_btn_url"  class="form-control" value="{{get_static_option('topbar_btn_url')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <x-fields.switch :title="__('Open in new Tab?')" :name="'topbar_btn_open_external'" :type="'yes'"/>
                                            </div>
                                            <div class="col-md-2">
                                                <x-icon-picker.field :title="__('Button Icon')" :name="'topbar_btn_icon'" :id="'topbar_btn_icon'" :value="'topbar_btn_icon'"/>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endfor
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Topbar Variant')}}</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_support_info" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add New Support Info')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.topbar.info.store')}}"  method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{__('Details')}}</label>
                            <input type="text" class="form-control"  id="details" name="details" placeholder="{{__('Details')}}">
                        </div>
                        <x-icon-picker.field :title="__('Social Icon')" :name="'icon'" id="icon" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="submit" class="btn btn-primary">{{__('Add New Support Info Item')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="support_info_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Support Info')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.topbar.info.update')}}" id="support_info_item_edit_modal_form"  method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="support_info_id" name="id" value="">
                        <div class="form-group">
                            <label for="title">{{__('Details')}}</label>
                            <input type="text" class="form-control"  id="edit_details" name="details" placeholder="{{__('Details')}}">
                        </div>
                        <x-icon-picker.field :title="__('Social Icon')" :name="'icon'" id="edit_icon" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="save" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_social_icon" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Social Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.topbar.icon.store')}}"  method="post">
                    <div class="modal-body">
                        @csrf
                        <x-icon-picker.field :title="__('Social Icon')" :name="'social_item_icon'" id="social_item_icon" />
                        <div class="form-group">
                            <label for="social_item_link">{{__('URL')}}</label>
                            <input type="text" name="url" id="social_item_link"  class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="submit" class="btn btn-primary">{{__('Add Social Item')}}</button>
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
                <form action="{{route('admin.topbar.icon.update')}}"  method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="social_item_id" value="">
                        <x-icon-picker.field :title="__('Social Icon')" :name="'social_item_icon'" id="edit_social_item_icon" />
                        <div class="form-group">
                            <label for="social_item_edit_url">{{__('Url')}}</label>
                            <input type="text" class="form-control"  id="social_item_edit_url" name="url" placeholder="{{__('Url')}}">
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
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.topbar.info.bulk.action')"/>
<x-icon-picker.js/>
<x-btn.submit/>
<x-btn.save/>
<x-btn.update/>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            $(document).on('click','.support_info_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var details = el.data('details');
                var form = $('#support_info_item_edit_modal_form');
                form.find('#support_info_id').val(id);
                form.find('#edit_details').val(details);
                form.find('#edit_icon').val(el.data('iconsupport'));
                form.find('.edit_icon .icp-dd').attr('data-selected',el.data('iconsupport'));
                form.find('.edit_icon .iconpicker-component i').attr('class',el.data('iconsupport'));
            });
            $(document).on('click','.social_item_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var url = el.data('url');
                var form = $('#social_item_edit_modal');
                form.find('#social_item_id').val(id);
                form.find('#social_item_edit_url').val(url);
                form.find('#edit_social_item_icon').val(el.data('iconsocial'));
                form.find('.edit_social_item_icon .icp-dd').attr('data-selected',el.data('iconsocial'));
                form.find('.edit_social_item_icon .iconpicker-component i').attr('class',el.data('iconsocial'));
            });
            $(document).ready(function () {
                var imgSelect = $('.img-select');
                var id = $('#topbar_variant').val();
                imgSelect.removeClass('selected');
                $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
                $(document).on('click','.img-select img',function (e) {
                    e.preventDefault();
                    imgSelect.removeClass('selected');
                    $(this).parent().parent().addClass('selected').siblings();
                    $('#topbar_variant').val($(this).data('home_id'));
                })
            })
        });
        })(jQuery);        
    </script>
@endsection
