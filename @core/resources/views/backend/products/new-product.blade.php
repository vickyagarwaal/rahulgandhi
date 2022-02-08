@extends('backend.admin-master')
@section('site-title')
    {{__('New Products')}}
@endsection
@section('style')
<x-summernote.css/>
<x-media.css/>
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
                            <h4 class="header-title">{{__('Add New Products')}}</h4>
                            <a href="{{route('admin.products.all')}}" class="btn btn-info">{{__('All Products')}}</a>
                        </div>
                        <form action="{{route('admin.products.new')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="text" class="form-control"  id="title" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="slug">{{__('Slug')}}</label>
                                <input type="text" class="form-control"  id="slug" name="slug" value="{{old('slug')}}" placeholder="{{__('slug')}}">
                            </div>
                            <div class="form-group">
                                <label for="badge">{{__('Badge')}}</label>
                                <input type="text" class="form-control"  id="badge" name="badge" value="{{old('badge')}}" placeholder="{{__('eg: New')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Description')}}</label>
                                <input type="hidden" name="description">
                                <div class="summernote"></div>
                            </div>
                            <div class="form-group">
                                <label for="short_description">{{__('Short Description')}}</label>
                                <textarea name="short_description" id="short_description" class="form-control max-height-120" cols="30" rows="4" placeholder="{{__('Short Description')}}"></textarea>
                            </div>
                            <div class="form-group attributes-field">
                                <label for="attributes">{{__('Attributes')}}</label>
                               <div class="attribute-field-wrapper">
                                   <input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="{{__('Title')}}">
                                   <textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="{{__('Value')}}"></textarea>
                                  <div class="icon-wrapper">
                                      <span class="add_attributes"><i class="ti-plus"></i></span>
                                  </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" name="meta_title" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('OG Meta Title')}}</label>
                                    <input type="text" name="og_meta_title" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" rows="5" id="meta_description"></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('OG Meta Description')}}</label>
                                    <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                           id="meta_tags">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_image">{{__('OG Meta Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap"></div>
                                        <input type="hidden" name="og_meta_image">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__('Upload Image')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">{{__('Category')}}</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($all_categories as $category)
                                        <option value="{{$category->id}}">{{purify_html($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="AppendSubCategory">
                                <div class="form-group">
                                    <label for="sub_category_id">{{('Sub Category')}}</label>
                                    <select class="form-control" name="sub_category_id" >
                                        <option value="parent" selected disabled>{{__('Select Category First')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="regular_price">{{__('Regular Price')}}</label>
                                    <input type="number" class="form-control"  id="regular_price" name="regular_price" placeholder="{{__('Regular Price')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sale_price">{{__('Sale Price')}}</label>
                                    <input type="number" class="form-control"  id="sale_price" name="sale_price" placeholder="{{__('Sale Price')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sku">{{__('SKU')}}</label>
                                    <input type="text" class="form-control"  id="sku" name="sku" placeholder="{{__('SKU')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stock_status">{{__('Stock')}}</label>
                                    <select name="stock_status" class="form-control" id="stock_status">
                                        <option value="in_stock">{{__('In Stock')}}</option>
                                        <option value="out_stock">{{__('Out Of Stock')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_downloadable"><strong>{{__('Is downloadable ?')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="is_downloadable" id="is_downloadable">
                                    <span class="slider-yes-no"></span>
                                </label>
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="downloadable_file">{{__('Downloadable File')}}</label>
                                <input type="file" name="downloadable_file"  class="form-control" id="downloadable_file">
                                <span class="info-text text-danger">{{__('only zip file is allowed')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="image">{{__('Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Product Image" data-modaltitle="Upload Product Image" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('1920 x 1280 pixels (recommended)')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="image">{{__('Gallery')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="gallery">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-mulitple="true" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                                <small class="form-text text-muted">{{__('1920 x 1280 pixels (recommended)')}}</small>
                            </div>
                            @if(get_static_option('product_tax_type') == 'individual')
                                <div class="form-group">
                                    <label for="tax_percentage">{{__('Tax Percentage')}}</label>
                                    <input type="number" class="form-control"  id="tax_percentage" name="tax_percentage" >
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="is_featured"><strong>{{__('Is Featured ?')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="is_featured" id="is_featured">
                                    <span class="slider-yes-no"></span>
                                </label>
                            </div>
                            <x-fields.status :name="'status'" :title="__('Status')"/>
                            <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Submit')}}</button>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <x-media.markup/>
@endsection
@section('script')
<x-btn.submit/>
<x-summernote.js/>
<x-media.js/>
<script src="{{asset('assets/backend/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>

<script>
(function ($){
        "use strict";        
        $(document).ready(function () {
            $(document).on('change','#is_downloadable',function (e) {
                e.preventDefault();
                isDownloadableCheck('#is_downloadable');
            });

            $(document).on('click','.attribute-field-wrapper .add_attributes',function (e) {
               e.preventDefault();
                $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                    '<input type="text" class="form-control"  id="attributes" name="attributes_title[]" placeholder="{{__('Title')}}">\n' +
                    '<textarea name="attributes_description[]"  class="form-control" rows="5" placeholder="{{__('Value')}}"></textarea>\n' +
                    '<div class="icon-wrapper">\n' +
                    '<span class="add_attributes"><i class="ti-plus"></i></span>\n' +
                    '<span class="remove_attributes"><i class="ti-trash"></i></span>\n' +
                    '</div>\n' +
                    '</div>');

            });
            $(document).on('click','.attribute-field-wrapper .remove_attributes',function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();

            });
            function isDownloadableCheck($selector) {
                var dnFile = $('#downloadable_file');
                var dnFileUrl = $('#downloadable_file_link');
                if($($selector).is(':checked')){
                    dnFile.parent().show();
                    dnFileUrl.parent().show();
                }else{
                    dnFile.parent().hide();
                    dnFileUrl.parent().hide();
                }
            }
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
