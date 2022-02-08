@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Products')}}
@endsection
@section('style')
    <x-media.css/>
    <x-summernote.css/>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Edit Products')}}</h4>
                            <a href="{{route('admin.products.all')}}" class="btn btn-info">{{__('All Products')}}</a>
                        </div>
                        <form action="{{route('admin.products.update')}}" method="post" enctype="multipart/form-data">@csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control"   name="title" value="{{$product->title}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="slug">{{__('Slug')}}</label>
                                <input type="text" class="form-control"  name="slug" value="{{$product->slug}}" placeholder="{{__('slug')}}">
                            </div>
                            <div class="form-group">
                                <label for="badge">{{__('Badge')}}</label>
                                <input type="text" class="form-control"  name="badge" value="{{$product->badge}}" placeholder="{{__('eg: New')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Description')}}</label>
                                <input type="hidden" name="description" value="{{$product->description}}">
                                <div class="summernote" data-content="{{$product->description}}">{!! ($product->description) !!}</div>
                            </div>
                            <div class="form-group">
                                <label for="short_description">{{__('Short Description')}}</label>
                                <textarea name="short_description" id="short_description" class="form-control max-height-120" cols="30" rows="4" placeholder="{{__('Short Description')}}">{{$product->short_description}}</textarea>
                            </div>
                            <div class="form-group attributes-field">
                                <label for="attributes">{{__('Attributes')}}</label>
                                @php
                                    $att_title = unserialize($product->attributes_title);
                                    $att_descr = unserialize($product->attributes_description);
                                @endphp
                                @if(!empty($att_title))
                                @foreach($att_title as $key => $att_title)
                                    <div class="attribute-field-wrapper">
                                       <input type="text" class="form-control"  id="attributes" name="attributes_title[]" value="{{$att_title}}">
                                       <textarea name="attributes_description[]"  class="form-control" rows="5">{{$att_descr[$key]}}</textarea>
                                      <div class="icon-wrapper">
                                          <span class="add_attributes"><i class="ti-plus"></i></span>
                                          @if($key > 0) <span class="remove_attributes"><i class="ti-minus"></i></span> @endif
                                      </div>
                                   </div>
                                @endforeach
                                @else
                                    <div class="attribute-field-wrapper">
                                        <input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="{{__('Title')}}">
                                        <textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="{{__('Value')}}"></textarea>
                                        <div class="icon-wrapper">
                                            <span class="add_attributes"><i class="ti-plus"></i></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('OG Meta Title')}}</label>
                                    <input type="text" name="og_meta_title" value="{{$product->og_meta_title}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" rows="5" id="meta_description">{{$product->meta_description}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('OG Meta Description')}}</label>
                                    <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description">{{$product->og_meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                        id="meta_tags" value="{{$product->meta_tags}}" >
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="og_meta_image">{{__('OG Meta Image')}}</label>
                                        <div class="media-upload-btn-wrapper">
                                            <div class="img-wrap">
                                                @php
                                                    $image = get_attachment_image_by_id($product->og_meta_image,null,true);
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
                                            <input type="hidden" id="og_meta_image" name="og_meta_image" value="{{$product->og_meta_image}}">
                                            <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                                {{__($image_btn_label)}}
                                            </button>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">{{__('Category')}}</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($all_categories as $category)
                                        <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{purify_html($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="AppendSubCategory">
                                @if(!empty($product->sub_category_id))
                                <div class="form-group">
                                    <label for="category">{{__('Sub Category')}}</label>
                                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                                        @foreach($all_sub_categories as $category)
                                            <option @if($product->sub_category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                    <div class="form-group">
                                        <label for="sub_category_id">{{('Sub Category')}}</label>
                                        <select class="form-control" name="sub_category_id" >
                                            <option value="parent" selected disabled>{{__('Select Category First')}}</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="regular_price">{{__('Regular Price')}}</label>
                                    <input type="number" class="form-control"  id="regular_price" name="regular_price" value="{{$product->regular_price}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sale_price">{{__('Sale Price')}}</label>
                                    <input type="number" class="form-control"  id="sale_price" name="sale_price" value="{{$product->sale_price}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sku">{{__('SKU')}}</label>
                                    <input type="text" class="form-control"  id="sku" name="sku" value="{{$product->sku}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stock_status">{{__('Stock')}}</label>
                                    <select name="stock_status" class="form-control" id="stock_status">
                                        <option @if($product->stock_status == 'in_stock') selected @endif value="in_stock">{{__('In Stock')}}</option>
                                        <option @if($product->stock_status == 'out_stock') selected @endif value="out_stock">{{__('Out Of Stock')}}</option>
                                    </select>
                                </div>
                            </div>
                            <x-fields.image :name="'image'" :id="$product->image" :title="__('Image')" :dimentions="'350 x 500'"/>
                            <div class="form-group">
                                <label for="image">{{__('Gallery')}}</label>
                                @php
                                    $gallery_images = !empty( $product->gallery) ? explode('|', $product->gallery) : [];
                                @endphp
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        @foreach($gallery_images as $gl_img)
                                            @php
                                                $work_section_img = get_attachment_image_by_id($gl_img,null,true);
                                            @endphp
                                            @if (!empty($work_section_img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$work_section_img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="gallery" value="{{$product->gallery}}">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                                <small>{{__('Recommended image size 1920x1280')}}</small>
                            </div>
                            @if(get_static_option('product_tax_type') == 'individual')
                            <div class="form-group">
                                <label for="tax_percentage">{{__('Tax Percentage')}}</label>
                                <input type="number" class="form-control"  id="tax_percentage" name="tax_percentage" value="{{$product->tax_percentage}}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="is_featured"><strong>{{__('Is Featured in Homepage?')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox"  @if($product->is_featured) checked @endif name="is_featured" id="is_featured">
                                    <span class="slider-yes-no"></span>
                                </label>
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')" :value="$product->status"/>
                            <button type="submit" id="save" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Save Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
<x-media.js/>
<x-btn.save/>
<x-summernote.js/>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
    (function ($){
    "use strict";
        $(document).ready(function () {
            
            $(document).on('click','.attribute-field-wrapper .add_attributes',function (e) {
               e.preventDefault();
                $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                    '<input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="{{__('Title')}}">\n' +
                    '<textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="{{__('Value')}}"></textarea>\n' +
                    '<div class="icon-wrapper">\n' +
                    '<span class="add_attributes"><i class="ti-plus"></i></span>\n' +
                    '<span class="remove_attributes"><i class="ti-minus"></i></span>\n' +
                    '</div>\n' +
                    '</div>');

            });
            loadDefault();

            $(document).on('change','#category',function(){
                    var category_id = $(this).val();
                    LoadajAjaxsubCategory(category_id);
            });

            function loadDefault(){
                var category_id = $('#category').val();
                LoadajAjaxsubCategory(category_id);
            }

           function  LoadajAjaxsubCategory(category_id) {
               $.ajax({
                   type: 'GET',
                   url: '{{route("admin.products.subcategory.info")}}',
                   data: {category_id: category_id},
                   success: function (resp) {
                       $("#AppendSubCategory").html(resp.view);
                   }, error: function () {

                   }
               });
           }

        });
    })(jQuery)
    </script>
    
@endsection
