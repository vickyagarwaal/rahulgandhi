@extends('backend.admin-master')
@section('site-title')
    {{__('Product Track Page Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__("Product Track Page Settings")}}</h4>
                        <form action="{{route('admin.products.track.page.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="product_track_order_confirmed_text">{{__('Order Confirmed')}}</label>
                                <input type="text" name="product_track_order_confirmed_text"  class="form-control" value="{{get_static_option('product_track_order_confirmed_text')}}" id="product_track_order_confirmed_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_payment_complete_text">{{__('Payment Complete')}}</label>
                                <input type="text" name="product_track_payment_complete_text"  class="form-control" value="{{get_static_option('product_track_payment_complete_text')}}" id="product_track_payment_complete_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_payment_pending_text">{{__('Payment Pending')}}</label>
                                <input type="text" name="product_track_payment_pending_text"  class="form-control" value="{{get_static_option('product_track_payment_pending_text')}}" id="product_track_payment_pending_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_in_transit_text">{{__('In Transit')}}</label>
                                <input type="text" name="product_track_in_transit_text"  class="form-control" value="{{get_static_option('product_track_in_transit_text')}}" id="product_track_in_transit_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_shipped_text">{{__('Shipped')}}</label>
                                <input type="text" name="product_track_shipped_text"  class="form-control" value="{{get_static_option('product_track_shipped_text')}}" id="product_track_shipped_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_delivered_text">{{__('Delivered')}}</label>
                                <input type="text" name="product_track_delivered_text"  class="form-control" value="{{get_static_option('product_track_delivered_text')}}" id="product_track_delivered_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_order_complete_text">{{__('Order Complete')}}</label>
                                <input type="text" name="product_track_order_complete_text"  class="form-control" value="{{get_static_option('product_track_order_complete_text')}}" id="product_track_order_complete_text">
                            </div>
                            <div class="form-group">
                                <label for="product_track_order_canceled_text">{{__('Order Canceled')}}</label>
                                <input type="text" name="product_track_order_canceled_text"  class="form-control" value="{{get_static_option('product_track_order_canceled_text')}}" id="product_track_order_canceled_text">
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