@extends('backend.admin-master')
@section('site-title')
    {{__('Team Member Section')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
<x-summernote.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Team Member Items')}}</h4>
                        <x-bulk-action/>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_team_members as $key => $all_team_member)
                                <li class="nav-$all_team_members">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            @foreach($all_team_members as $key => $all_team_member)
                                <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default">
                                        <thead>
                                            <th class="no-sort">
                                                <div class="mark-all-checkbox">
                                                    <input type="checkbox" class="all-checkbox">
                                                </div>
                                            </th>
                                            <th>{{__('ID')}}</th>
                                            <th>{{__('Image')}}</th>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Designation')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($all_team_member as $data)
                                            <tr>
                                                <td>
                                                    <x-bulk-delete-checkbox :id="$data->id"/>
                                                </td>
                                                <td>{{$data->id}}</td>
                                                <td> 
                                                    @php
                                                    $img = get_attachment_image_by_id($data->image,null,true);
                                                    @endphp
                                                    @if (!empty($img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="{{$img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php  $img_url = $img['img_url']; @endphp
                                                    @endif
                                                </td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->designation}}</td>
                                                <td> 
                                                    <x-delete-popover :url="route('admin.team.member.delete',$data->id)"/>
                                                    <a href="#"
                                                    data-toggle="modal"
                                                    data-target="#team_member_item_edit_modal"
                                                    class="btn btn-primary btn-xs mb-3 mr-1 team_member_edit_btn"
                                                    data-id="{{$data->id}}"
                                                    data-action="{{route('admin.team.member.update')}}"
                                                    data-name="{{$data->name}}"
                                                    data-designation="{{$data->designation}}"
                                                    data-iconOne="{{$data->icon_one}}"
                                                    data-iconTwo="{{$data->icon_two}}"
                                                    data-iconThree="{{$data->icon_three}}"
                                                    data-iconOneUrl="{{$data->icon_one_url}}"
                                                    data-iconTwoUrl="{{$data->icon_two_url}}"
                                                    data-iconThreeUrl="{{$data->icon_three_url}}"
                                                    data-lang="{{$data->lang}}"
                                                    data-imageid="{{$data->image}}"
                                                    data-image="{{$img_url}}"
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
                                @php $b++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('New Team Member')}}</h4>
                        <form action="{{route('admin.team.member')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <x-add-language/>
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name"  name="name" placeholder="{{__('Name')}}">
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Designation')}}</label>
                                <input type="text" class="form-control"  id="designation"  name="designation" placeholder="{{__('Designation')}}">
                            </div>
                            <x-add-icon :name="'icon_one'" :id="'icon_one'" :title="__('Social Profile One Icon ')" :setval="'fab fa-instagram'"/>
                            <div class="form-group">
                                <label for="icon_one_url">{{__('Social Profile One URL')}}</label>
                                <input type="text" class="form-control"  id="icon_one_url"  name="icon_one_url" placeholder="{{__('Social Profile One URL')}}">
                            </div>
                            <x-add-icon :name="'icon_two'" :id="'icon_two'" :title="__('Social Profile Two Icon ')" :setval="'fab fa-twitter'"/>
                            <div class="form-group">
                                <label for="icon_two_url">{{__('Social Profile Two URL')}}</label>
                                <input type="text" class="form-control"  id="icon_two_url"  name="icon_two_url" placeholder="{{__('Social Profile Two URL')}}">
                            </div>
                            <x-add-icon :name="'icon_three'" :id="'icon_three'" :title="__('Social Profile Three Icon ')" :setval="'fab fa-twitter'"/>
                            <div class="form-group">
                                <label for="icon_three_url">{{__('Social Profile Three URL')}}</label>
                                <input type="text" class="form-control"  id="icon_three_url"  name="icon_three_url" placeholder="{{__('Social Profile Three URL')}}">
                            </div>
                            <div class="form-group">
                                <label for="image">{{__('Image')}}</label>
                                <x-image :id="'image'" :name="'image'" :value="'image'"/>
                                <small class="form-text text-muted">{{__('250 x 250 pixels (recommended)')}}</small>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="team_member_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Team Member Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="team_member_edit_modal_form"  method="post" enctype="multipart/form-data"> @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="team_member_id" value="">
                        <x-edit-language/>
                        <div class="form-group">
                            <label for="edit_name">{{__('Name')}}</label>
                            <input type="text" class="form-control"  id="edit_name"  name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation">{{__('Designation')}}</label>
                            <input type="text" class="form-control"  id="edit_designation"  name="designation" placeholder="{{__('Designation')}}">
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="icon_one_url">{{__('Social Profile One URL')}}</label>
                                    <input type="text" class="form-control"  id="edit_icon_one_url"  name="icon_one_url" placeholder="{{__('Social Profile One URL')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <x-add-icon :name="'icon_one'" :id="'edit_icon_one'" :title="__('Social Profile One Icon ')" :setval="'fab fa-instagram'"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="icon_two_url">{{__('Social Profile Two URL')}}</label>
                                    <input type="text" class="form-control"  id="edit_icon_two_url"  name="icon_two_url" placeholder="{{__('Social Profile Two URL')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <x-add-icon :name="'icon_two'" :id="'edit_icon_two'" :title="__('Social Profile Two Icon ')" :setval="'fab fa-twitter'"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="icon_three_url">{{__('Social Profile Three URL')}}</label>
                                    <input type="text" class="form-control"  id="edit_icon_three_url"  name="icon_three_url" placeholder="{{__('Social Profile Three URL')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <x-add-icon :name="'icon_three'" :id="'edit_icon_three'" :title="__('Social Profile Three Icon ')" :setval="'fab fa-twitter'"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <x-image :id="'image'" :name="'image'" :value="'image'"/>
                            <small class="form-text text-muted">{{__('250 x 250 pixels (recommended)')}}</small>
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
<x-summernote.js/>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            <x-bulk-action-js :url="route('admin.team.member.bulk.action')" />
            <x-icon-picker/>
            <x-btn.submit/>
            <x-btn.save/>
            $(document).on('click','.team_member_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var designation = el.data('designation');
                var action = el.data('action');
                var form = $('#team_member_edit_modal_form');
                form.attr('action',action);
                form.find('#team_member_id').val(id);
                form.find('#edit_name').val(name);
                form.find('#edit_designation').val(designation);
                form.find('#edit_icon_one').val(el.data('iconone'));
                form.find('#edit_icon_two').val(el.data('icontwo'));
                form.find('#edit_icon_three').val(el.data('iconthree'));
                form.find('#edit_icon_one_url').val(el.data('icononeurl'));
                form.find('#edit_icon_two_url').val(el.data('icontwourl'));
                form.find('#edit_icon_three_url').val(el.data('iconthreeurl'));
                form.find('#edit_language option[value='+el.data("lang")+']').attr('selected',true);
                form.find('.edit_icon_three .icp-dd').attr('data-selected',el.data('iconthree'));
                form.find('.edit_icon_three .iconpicker-component i').attr('class',el.data('iconthree'));
                form.find('.edit_icon_two .icp-dd').attr('data-selected',el.data('icontwo'));
                form.find('.edit_icon_two .iconpicker-component i').attr('class',el.data('icontwo'));
                form.find('.edit_icon_one .icp-dd').attr('data-selected',el.data('iconone'));
                form.find('.edit_icon_one .iconpicker-component i').attr('class',el.data('iconone'));
                var image = el.data('image');
                var imageid = el.data('imageid');
                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });
        });
                
        })(jQuery);        
    </script>
@endsection
