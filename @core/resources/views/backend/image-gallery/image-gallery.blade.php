@extends('backend.admin-master')
@section('site-title')
    {{__('Image Gallery')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Image Gallery')}}</h4>
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
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_gallery_images as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-action.bulk.checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
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
                                        <td>{{get_image_category_name_by_id($data->cat_id)}}</td>
                                        <td>
                                            <x-delete-popover :url="route('admin.gallery.delete',$data->id)"/>
                                            <a href="#"
                                            data-toggle="modal"
                                            data-target="#testimonial_item_edit_modal"
                                            class="btn btn-lg btn-primary btn-sm mb-3 mr-1 testimonial_edit_btn"
                                            data-id="{{$data->id}}"
                                            data-title="{{$data->title}}"
                                            data-image="{{$img_url}}"
                                            data-imageid="{{$data->image}}"
                                            data-catid="{{$data->cat_id}}">
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
                        <h4 class="header-title">{{__('Add New Image')}}</h4>
                        <form action="{{route('admin.gallery.new')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cat_id">{{__('Category')}}</label>
                                <select name="cat_id" class="form-control">
                                    @foreach($all_categories as $cat)
                                        <option value="{{$cat->id}}" >{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-fields.image :title="__('Image')" :name="'image'"  :dimentions="__('1000 x 1000')"/>
                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Image')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="testimonial_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Testimonial Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.gallery.update')}}" id="testimonial_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="gallery_id" value="">
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="text" name="title" id="edit_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cat_id">{{__('Category')}}</label>
                            <select name="cat_id" class="form-control">
                                @foreach($all_categories as $cat)
                                    <option value="{{$cat->id}}" >{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-fields.image :title="__('Image')" :name="'image'" :id="'edit_image'"  :dimentions="__('1000 x 1000')"/>
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
<x-media.js/>
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.gallery.bulk.action')"/>
<x-btn.submit/>
<x-btn.save/>
    <script>
        $(document).ready(function () {
            $(document).on('click','.testimonial_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var image = el.data('image');
                var imageid = el.data('imageid');
                var catid = el.data('catid');
                var form = $('#testimonial_edit_modal_form');
                form.find('#gallery_id').val(id);
                form.find('#edit_title').val(el.data('title'));
                $.ajax({
                    url : "{{route('admin.gallery.category.by.lang')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                    },
                    success:function (data) {
                        form.find('select[name="cat_id"]').html('');
                        $.each(data,function (index,value) {
                            var selected = value.id == catid ? 'selected' : '';
                            form.find('select[name="cat_id"]').append('<option '+selected+' value="'+value.id+'">'+value.title+'</option>');
                        })
                    }
                });
                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });
        });
    </script>
@endsection
