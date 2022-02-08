@extends('backend.admin-master')
@section('site-title')
    {{__('Prescription Guideline')}}
@endsection
@section('style')
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Prescription Guideline')}}</h4>
                            <a href="{{route('admin.prescription.all')}}" class="btn btn-info">{{__('All Prescription')}}</a>
                        </div>
                        <form action="{{route('admin.prescription.guideline.update')}}" method="post" enctype="multipart/form-data">@csrf
                            <input type="hidden" name="id" value="{{$prescription->id}}">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" name="name" class="form-control" readonly value="{{$prescription->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="text" name="email" class="form-control" readonly value="{{$prescription->email}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" name="phone" class="form-control" readonly value="{{$prescription->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="customer_message">{{__('Customer Message')}}</label>
                                <textarea name="customer_message" class="form-control" readonly rows="5" >{{strip_tags($prescription->customer_message)}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="admin_feedback_message">{{__('Your Feedback/Guideline')}}</label>
                                <textarea name="admin_feedback_message" class="form-control" rows="5" id="admin_feedback_message">{{$prescription->admin_feedback_message}}</textarea>
                            </div>
                           <div class="form-group">
                                <label for="product_order_id">{{__('Assign Product Order')}}</label>
                                <select name="product_order_id" class="form-control" id="product_order_id">
                                    <option value="" selected disabled>{{__("Select Available Order")}}</option>
                                    @foreach($product_order as $order)
                                    @if(!empty($order->order_created_by) && $order->status == 'pending')
                                        <option @if($order->id == $prescription->product_order_id) selected @endif  value="{{$order->id}}">{{__('Order ID: #'.$order->id)}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">{{__('* if you want to assign a product order , you have to first create an order from')}} <a target="__blank" href="{{route('admin.product.order.create')}}">{{__('create product order')}}</a>{{__(' page')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">{{__("Select Status")}}</option>
                                    <option @if($prescription->status == 'pending') selected @endif  value="{{__('pending')}}">{{__('Pending')}}</option>
                                    <option @if($prescription->status == 'opened') selected @endif  value="{{__('opened')}}">{{__('Opened')}}</option>
                                    <option @if($prescription->status == 'replied') selected @endif  value="{{__('replied')}}">{{__('Replied')}}</option>
                                    <option @if($prescription->status == 'cancel') selected @endif  value="{{__('cancel')}}">{{__('Cancel')}}</option>
                                </select>
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Guideline')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-btn.update/>
    <script>
    (function ($){
            "use strict";
    })(jQuery)
    </script>
@endsection
