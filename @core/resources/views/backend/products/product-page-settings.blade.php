@extends('backend.admin-master')
@section('site-title')
    {{__('Products Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__("Products Page Settings")}}</h4>
                        <form action="{{route('admin.products.page.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="product_category_text">{{__('Category Title')}}</label>
                                <input type="text" name="product_category_text"  class="form-control" value="{{get_static_option('product_category_text')}}" id="product_category_text">
                            </div>
                            <div class="form-group">
                                <label for="product_price_filter_text">{{__('Price Filter Title')}}</label>
                                <input type="text" name="product_price_filter_text"  class="form-control" value="{{get_static_option('product_price_filter_text')}}" id="product_price_filter_text">
                            </div>
                            <div class="form-group">
                                <label for="product_rating_filter_text">{{__('Rating Filter Title')}}</label>
                                <input type="text" name="product_rating_filter_text"  class="form-control" value="{{get_static_option('product_rating_filter_text')}}" id="product_rating_filter_text">
                            </div>
                            <div class="form-group">
                                <label for="product_add_to_cart_button_text">{{__('Add To Cart Button Text')}}</label>
                                <input type="text" name="product_add_to_cart_button_text"  class="form-control" value="{{get_static_option('product_add_to_cart_button_text')}}" id="product_add_to_cart_button_text">
                            </div>
                            <div class="form-group">
                                <label for="product_post_items">{{__('Products Items')}}</label>
                                <input type="number" name="product_post_items"  class="form-control" value="{{get_static_option('product_post_items')}}" id="product_post_items">
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-btn.update/>
@endsection