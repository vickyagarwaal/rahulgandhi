@extends('backend.admin-master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
<x-summernote.css/>
<x-media.css/>
@endsection
@section('site-title')
    {{__('Edit Blog Post')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Edit Blog Post')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.blog') }}" class="btn btn-primary mt-4 pr-4 pl-4">{{__('All Blog Post')}}</a>
                            </div>
                        </div>
                        <form action="{{route('admin.blog.update',$blog_post->id)}}" method="post" enctype="multipart/form-data"> @csrf
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control" name="title" value="{{$blog_post->title}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Blog Content')}}</label>
                                <input type="hidden" name="blog_content" value="{{$blog_post->content}}">
                                <div class="summernote" data-content="{{ $blog_post->content }}">{!! ($blog_post->content) !!}</div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="author">{{__('Author')}}</label>
                                    <input type="text" class="form-control" name="author" value="{{$blog_post->author}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control" name="slug" value="{{$blog_post->slug}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">{{__('Blog Tags')}}</label>
                                    <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{$blog_post->tags}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" class="form-control" name="meta_tags" value="{{$blog_post->meta_tags}}" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{$blog_post->meta_title}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('Og Meta Title')}}</label>
                                    <input type="text" class="form-control" name="og_meta_title" value="{{$blog_post->og_meta_title}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea type="text" class="form-control" name="meta_description" rows="5" cols="10">{{$blog_post->meta_description}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('Og Meta Description')}}</label>
                                    <textarea type="text" class="form-control" name="og_meta_description" rows="5" cols="10">{{$blog_post->og_meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="image">{{__('Blog Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($blog_post->image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="image" name="image" value="{{$blog_post->image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png')}}</small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="og_meta_image">{{__('Og Meta Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($blog_post->og_meta_image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="og_meta_image" name="og_meta_image" value="{{$blog_post->og_meta_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                    <small class="form-text text-muted">{{__('allowed image format: jpg,jpeg,png')}}</small>
                                </div>
                                
                            </div>
                            <div id="category_list" class="form-group">
                                <label for="category_id">{{__('Category')}}</label>
                                <select name="category_id" class="form-control" >
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($all_category as $category)
                                        <option value="{{$category->id}}" @if($blog_post->category_id == $category->id) selected @endif >{{purify_html($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')" :value="$blog_post->status" />
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Post')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
<x-summernote.js/>
<x-btn.update/>
<x-media.js/>
<script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
@endsection
