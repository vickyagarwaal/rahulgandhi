@extends('backend.admin-master')
@section('site-title')
    {{__('Create Order')}}
@endsection
@section('style')
<link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <x-msg.all/>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <div class="header-wrapp">
                        <h4 class="header-title">{{__('Create Order')}}  </h4>
                        <div class="header-title">
                            <a href="{{route('admin.products.order.logs')}}" class="btn btn-primary mt-4 pr-4 pl-4" >{{__('All Orders')}}</a>
                        </div>
                    </div>
            </div>
        </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Products')}}  </h4>
                        </div>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                    <th>{{__('Info')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                    @foreach($all_products as $data)
                                        <tr>
                                            <td>
                                                <ul>
                                                    <li><strong>{{__('Title')}}:</strong> {{$data->title}}</li>
                                                    <li><strong>{{__('Price')}}:</strong> <del>{{ amount_with_currency_symbol($data->regular_price) }}</del> <span>{{amount_with_currency_symbol($data->sale_price)}}</span></li>
                                                    <li><strong>{{__('Category')}}:</strong> {{$data->category->name ?? __('Anonymous')}}</li>
                                                    
                                                </ul>
                                                
                                            </td>
                                            <td>
                                               <div class="img-wrap">
                                                   @php
                                                       $event_img = get_attachment_image_by_id($data->image,'thumbnail',true);
                                                   @endphp
                                                   @if (!empty($event_img))
                                                       <div class="attachment-preview">
                                                           <div class="thumbnail">
                                                               <div class="centered">
                                                                   <img class="avatar user-thumb" src="{{$event_img['img_url']}}" alt="">
                                                               </div>
                                                           </div>
                                                       </div>
                                                   @endif
                                               </div>
                                            </td>
                                            <td>
                                                <x-view-icon :url="route('frontend.products.single',['slug'=>$data->slug,'id'=>$data->id])"/>
                                                <a class="btn btn-success btn-xs mb-3 mr-1 ajax_add_to_cart" 
                                                        href="{{route('frontend.products.add.to.cart')}}"
                                                        data-product_id="{{$data->id}}"
                                                        data-product_title="{{$data->title}}"
                                                        data-product_quantity="1">
                                                <i class="fas fa-cart-plus"></i>
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
            <div class="col-lg-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Select Customer')}}  </h4>
                        </div>
                        <div class="form-group">
                            <select name="user_id" class="form-control" id="user_id">
                                <option value="">{{__('Select Customer')}}</option>
                                @foreach ($all_users as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Order Table')}}  </h4>
                        </div>
                        @if(cart_total_items() > 0)
                        <div class="cart-wrapper">
                            <div class="cart-table-wrapper">
                                {!! render_cart_table() !!}
                            </div>
                            <form action="{{route('admin.product.order.place')}}" method="post" enctype="multipart/form-data" class="contact-form order-form checkout-form" id="checkout_form">
                                @csrf
                                <input type="hidden" name="selected_payment_gateway" value="{{get_static_option('site_default_payment_gateway')}}">
                                <input type="hidden" name="total" value="{{get_cart_total_cost(false)}}">
                                <input type="hidden" name="subtotal" value="{{get_cart_subtotal(false)}}">
                                <input type="hidden" name="coupon_discount" value="{{get_cart_coupon_discount(false)}}">
                                <input type="hidden" name="shipping_cost" value="{{get_cart_shipping_cost(false)}}">
                                <input type="hidden" name="product_shippings_id" value="{{session()->get('shipping_charge')}}">
                                <input type="hidden" name="transaction_id_val" id="transaction_id" placeholder="{{__('transaction')}}" class="form-control">
                                @if(is_shipping_available())
                                <div class="shipping-wrap">
                                <div class="cart-shipping-wrapper">
                                    <div class="accordion" id="cart_shipping_accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    {{__('Apply Shipping')}}
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#cart_shipping_accordion">
                                                <div class="card-body">
                                                    <div class="shipping-table-wrap table-responsive">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                @foreach($all_shipping as $data)
                                                                <tr>
                                                                    <td>
                                                                        <input type="radio" @if($data->is_default == '1' || session()->get('shipping_charge') == $data->id) checked @endif value="{{$data->id}}" name="shipping_id">
                                                                    </td>
                                                                    <td>
                                                                        <div class="shipping-details-wrap">
                                                                            <h5 class="title">{{$data->title}}</h5>
                                                                            <p>{{$data->description}}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="shipping-cost">
                                                                            {{amount_with_currency_symbol($data->cost)}}
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="btn-wrapper">
                                                            <a href="#" class="boxed-btn add_shipping">{{__('Apply Shipping')}}</a>
                                                            <div class="ajax-loading-wrap hide">
                                                                <div class="sk-fading-circle">
                                                                    <div class="sk-circle1 sk-circle"></div>
                                                                    <div class="sk-circle2 sk-circle"></div>
                                                                    <div class="sk-circle3 sk-circle"></div>
                                                                    <div class="sk-circle4 sk-circle"></div>
                                                                    <div class="sk-circle5 sk-circle"></div>
                                                                    <div class="sk-circle6 sk-circle"></div>
                                                                    <div class="sk-circle7 sk-circle"></div>
                                                                    <div class="sk-circle8 sk-circle"></div>
                                                                    <div class="sk-circle9 sk-circle"></div>
                                                                    <div class="sk-circle10 sk-circle"></div>
                                                                    <div class="sk-circle11 sk-circle"></div>
                                                                    <div class="sk-circle12 sk-circle"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endif
                                <div class="shipping-wrap">
                                    <div class="cart-shipping-wrapper">
                                        <div class="accordion" id="billing_address">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        {{__('Billing Information')}}
                                                    </a>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#billing_address">
                                                    <div class="card-body">
                                                        <div id="AppendBillInfo">
                                                            <h6 class="title">{{__('* Please Select a Customer')}}</h6>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipping-wrap">
                                    <div class="cart-shipping-wrapper">
                                        <div class="accordion" id="payment_method">
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <a data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        {{__('Payment Method')}}
                                                    </a>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#payment_method">
                                                    <div class="card-body">
                                                        {!! render_payment_gateway_for_form(true) !!}
                                                        @if(!empty(get_static_option('manual_payment_gateway')))
                                                        <div class="form-group manual_payment_transaction_field @if(get_static_option('site_default_payment_gateway') == 'manual_payment') show @endif ">
                                                            <div class="label">{{__('Transaction ID')}}</div>
                                                            <input type="text" name="transaction_id" placeholder="{{__('transaction')}}" class="form-control">
                                                            <span class="help-info">{!! get_manual_payment_description() !!}</span>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-total-wrap margin-top-30">
                                {!! render_cart_total_table() !!}
                                <button type="submit" class="btn-medheal" id="work">{{__('Place Order')}}</button>
                            </form>
                        </div>
                        @else
                        <div class="alert alert-warning">{{__('No Item In Cart!')}}</div>
                         @endif
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
@endsection
@section('script')
<x-media.js/>
<x-datatable.js/>
<x-btn.loading/>
<x-btn.work/>
<script src="{{asset('assets/common/js/toastr.min.js')}}"></script>
    <script>
        (function () {
            "use strict";

            $(document).on('click','.ajax_add_to_cart',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "{{route('frontend.products.add.to.cart.ajax')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        'product_id' : allData.product_id,
                        'quantity' : allData.product_quantity,
                    },
                    beforeSend: function(){
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fas fa-cart-plus"></i>');
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        location.reload();
                    }
                });
            });

            $(document).on('click','.payment-gateway-wrapper > ul > li',function (e) {
                e.preventDefault();
                var gateway = $(this).data('gateway');
                var manual_gateway_tr = $('.manual_payment_transaction_field');
                $(this).addClass('selected').siblings().removeClass('selected');
                $('input[name="selected_payment_gateway"]').val(gateway);
                if(gateway == 'manual_payment'){
                    manual_gateway_tr.addClass('show');
                }else{
                    manual_gateway_tr.removeClass('show');
                }
            });

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            @if(is_shipping_available())
            setDefaultShippingCost();
            
            function setDefaultShippingCost() {
                var defaultShippingValue = $('input[name="shipping_id"]:checked').val();
                var selectedShippingMethod = "{{session()->get('shipping_charge')}}";
                
                if(defaultShippingValue != '' && selectedShippingMethod == ''){
                    $.ajax({
                        url: "{{route('frontend.products.shipping.apply')}}",
                        type: "POST",
                        data: {
                            _token : "{{csrf_token()}}",
                            shipping_id : defaultShippingValue,
                        },
                        error: function(response){
                            var error = response.responseJSON.errors;
                            toastr.error(error.shipping_id[0]);
                        },
                        success:function (data) {
                            if(data.status == 'ok'){
                                $('.cart-total-wrap').html(data.cart_total_markup);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }
                    });
                }
            }

            $(document).on('click','.add_shipping',function (e) {
                e.preventDefault();
                var el = $(this);
                var shippingId = $('input[name="shipping_id"]:checked').val();
                
                $.ajax({
                    url: "{{route('frontend.products.shipping.apply')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        shipping_id : shippingId,
                    },
                    beforeSend: function(){
                        el.next('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                    error: function(response){
                        el.next('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        var error = response.responseJSON.errors;
                        toastr.error(error.shipping_id[0]);
                    },
                    success:function (data) {
                        el.next('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        if(data.status == 'ok'){
                            $('.cart-total-wrap').html(data.cart_total_markup);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                });
                
            });
            @endif
            $(document).on('click','.add_coupon_code_btn',function (e) {
                e.preventDefault();
                var el = $(this);
                var couponCode = $('input[name="coupon_code"]').val();
                $('.cart-table-footer-wrap .coupon-wrap').children('.error_wrap').remove();
                $.ajax({
                    url: "{{route('frontend.products.coupon.code')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        coupon_code : couponCode,
                    },
                    beforeSend: function(){
                        el.next('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                    error: function(response){
                        el.next('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        var error = response.responseJSON.errors;
                        toastr.error(error.coupon_code[0]);
                    },
                    success:function (data) {
                        el.next('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        if(data.status == 'ok'){
                            $('.cart-total-wrap').html(data.cart_total_markup);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                        location.reload();
                    }
                });
            });

            $(document).on('click','.update_cart_items_btn',function (e) {
                e.preventDefault();
                var el = $(this);
                var productId =  $("input[name='product_id[]']").map(function(){return $(this).val();}).get();
                var quantity =  $("input[name='product_quantity[]']").map(function(){return $(this).val();}).get();
                $.ajax({
                    url: "{{route('frontend.products.ajax.cart.update')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        product_id : productId,
                        quantity : quantity
                    },
                    beforeSend: function(){
                        el.prev('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                    success:function (data) {
                        
                        el.prev('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount').text(data.total_cart_item);
                        $('.cart-total-wrap').html(data.cart_total_markup);
                        $('.cart-table-wrapper').html(data.cart_table_markup);
                        var msg = "{{__('Cart Updated')}}";
                        toastr.success(msg);
                        location.reload();
                    }
                });
            });

            $(document).on('click','.ajax_remove_cart_item',function (e) {
                e.preventDefault();
                var el = $(this);
                var productId = el.data('product_id');
                $.ajax({
                   url: "{{route('frontend.products.cart.ajax.remove')}}",
                   type: "POST",
                   data: {
                       _token : "{{csrf_token()}}",
                       product_id : productId
                   },
                    beforeSend: function(){
                        el.next('.ajax-loading-wrap').removeClass('hide').addClass('show');
                    },
                   success:function (data) {
                       el.next('.ajax-loading-wrap').removeClass('show').addClass('hide');
                       $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount').text(data.total_cart_item);
                       $('.cart-total-wrap').html(data.cart_total_markup);
                       $('.cart-table-wrapper').html(data.cart_table_markup);
                       var msg = "{{__('Cart Item Removed')}}";
                       toastr.error(msg);
                     
                       if (!data.shipping_charge_status || $('.cart-table-wrapper table').length < 1){
                           $('.shipping-wrap').remove();
                       }
                       location.reload();
                   }
                });
            });
            $(document).on('change','#user_id',function (e) {
               var id = $(this).val()
                $.ajax({
                   url: "{{route('admin.product.bill.info')}}",
                   type: "GET",
                   data: {
                        id : id
                    },
                   success:function (data) {
                    $("#AppendBillInfo").html(data.view);
                   }
                });
            });
            
        })(jQuery);
    </script>
@endsection
