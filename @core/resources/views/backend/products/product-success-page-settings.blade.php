@extends('backend.admin-master')
@section('site-title')
    {{__('Order Success Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Order Success Page Settings")}}</h4>
                        <form action="{{route('admin.products.success.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_success_page_title">{{__('Main Title')}}</label>
                                <input type="text" name="product_success_page_title"  class="form-control" value="{{get_static_option('product_success_page_title')}}" id="product_success_page_title">
                            </div>
                            <div class="form-group">
                                <label for="product_success_page_description">{{__('Description')}}</label>
                                <textarea name="product_success_page_description" class="form-control max-height-120" id="product_success_page_description" cols="30" rows="10">{{get_static_option('product_success_page_description')}}</textarea>
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