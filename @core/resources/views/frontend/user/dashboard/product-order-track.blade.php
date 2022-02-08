@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{__('Track Your Order')}}</h2>
        <form action="{{route('user.home.product.order.track.query')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="order_id">{{__('Order ID')}}</label>
                        <input type="text" class="form-control order-id" id="order_id" name="order_id" placeholder="Enter your Order ID" value="{{($order_details->id)?? ''}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-wrapper">
                        <button type="submit" id="work" class="boxed-btn margin-top-20">{{__('Track')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if(!empty($order_details))
    @php $cart_items = unserialize($order_details->cart_items,['class' => false]); @endphp
    <div class="container">
        <article class="card-mod">
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{get_static_option('product_track_order_confirmed_text')}}</span> </div>
                @if( $order_details->payment_status == 'complete' )
                <div class="step active"> <span class="icon"> <i class="fas fa-hand-holding-usd"></i> </span> <span class="text">{{get_static_option('product_track_payment_complete_text')}}</span> </div>
                @else
                <div class="step active"> <span class="icon"> <i class="fas fa-clock"></i> </span> <span class="text">{{get_static_option('product_track_payment_pending_text')}}</span> </div>
                @endif
                @if( $order_details->status == 'pending')
                <div class="step"> <span class="icon"> <i class="fas fa-shipping-fast"></i> </span> <span class="text">{{get_static_option('product_track_in_transit_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-truck-loading"></i> </span> <span class="text">{{get_static_option('product_track_shipped_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-people-carry"></i> </span> <span class="text">{{get_static_option('product_track_delivered_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{get_static_option('product_track_order_complete_text')}}</span> </div>
                @endif
                @if($order_details->status == 'in_transit')
                <div class="step active"> <span class="icon"> <i class="fas fa-shipping-fast"></i> </span> <span class="text">{{get_static_option('product_track_in_transit_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-truck-loading"></i> </span> <span class="text">{{get_static_option('product_track_shipped_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-people-carry"></i> </span> <span class="text">{{get_static_option('product_track_delivered_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{get_static_option('product_track_order_complete_text')}}</span> </div>
                @endif
                @if($order_details->status == 'shipped')
                <div class="step active"> <span class="icon"> <i class="fas fa-shipping-fast"></i> </span> <span class="text">{{get_static_option('product_track_in_transit_text')}}</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-truck-loading"></i> </span> <span class="text">{{get_static_option('product_track_shipped_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fas fa-people-carry"></i> </span> <span class="text">{{get_static_option('product_track_delivered_text')}}</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{get_static_option('product_track_order_complete_text')}}</span> </div>
                @endif
                @if($order_details->status == 'complete')
                <div class="step active"> <span class="icon"> <i class="fas fa-shipping-fast"></i> </span> <span class="text">{{get_static_option('product_track_in_transit_text')}}</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-truck-loading"></i> </span> <span class="text">{{get_static_option('product_track_shipped_text')}}</span> </div>
                <div class="step active"> <span class="icon"> <i class="fas fa-people-carry"></i> </span> <span class="text">{{get_static_option('product_track_delivered_text')}}</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{get_static_option('product_track_order_complete_text')}}</span> </div>
                @endif
                @if($order_details->status == 'cancel')
                    <div class="step active"> <span class="icon"> <i class="fas fa-window-close"></i> </span> <span class="text">{{get_static_option('product_track_order_canceled_text')}}</span> </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <header class="card-mod-header"><strong>{{__('Order ID:')}}</strong> <a href="{{route('user.dashboard.product.order.view',$order_details->id)}}" class="blue" target="_blank">{{$order_details->id}}</a></header>
                    <header class="card-mod-header"><strong>{{__('Shipping Method:')}}</strong> {{get_shipping_name_by_id($order_details->product_shippings_id)}}</header>
                    <header class="card-mod-header"><strong>{{__('Payment Method:')}}</strong> {{str_replace('_',' ', ucfirst($order_details->payment_gateway))}}</header>
                    <header class="card-mod-header"><strong>{{__('Payment Status:')}}</strong> {{__($order_details->payment_status)}}</header>
                    <header class="card-mod-header"><strong>{{__('Order Status:')}}</strong> {{__($order_details->status)}}</header>
                </div>
                <div class="col-md-6">
                    <header class="card-mod-header"><strong>{{__('Subtotal:')}}</strong> {{amount_with_currency_symbol($order_details->subtotal)}}</header>
                    <header class="card-mod-header"><strong>{{__('Coupon Discount:')}}</strong> - {{amount_with_currency_symbol($order_details->coupon_discount)}}</header>
                    <header class="card-mod-header"><strong>{{__('Shipping Cost:')}}</strong> + {{amount_with_currency_symbol($order_details->shipping_cost)}}</header>
                    @if(is_tax_enable())
                    @php $tax_percentage = get_static_option('product_tax_type') == 'total' ? '('.get_static_option('product_tax_percentage').')' : '';  @endphp
                        <header class="card-mod-header"><strong>{{__('Tax')}} {{$tax_percentage}} : </strong> + {{amount_with_currency_symbol(cart_tax_for_mail_template($cart_items))}}</header>
                    @endif
                    <header class="card-mod-header"><strong>{{__('Total:')}}</strong> {{amount_with_currency_symbol($order_details->total)}}</header>
                </div>
            </div>
            <div class="card-mod-body">
                
                <div class="ordered-product-summery margin-top-30">
                    <table class="table table-bordered">
                        <thead>
                        <th>{{__('Thumbnail')}}</th>
                        <th>{{__('Product Info')}}</th>
                        </thead>
                        <tbody>
                        @foreach($cart_items as $item)
                            @php $product_info = \App\Products::find($item['id']); @endphp
                            @if($product_info)
                            <tr>
                                <td>
                                    <div class="product-thumbnail">
                                        {!! render_image_markup_by_attachment_id($product_info->image ?? '','','thumb') !!}
                                    </div>
                                </td>
                                <td>
                                    <div class="product-info-wrap">
                                        <h4 class="product-title"><a href="{{route('frontend.products.single',[$product_info->slug ?? '',$product_info->id])}}">{{$product_info->title ?? __('untitled')}}</a></h4>
                                        <span class="pdetails"><strong>{{__('Price :')}}</strong> {{amount_with_currency_symbol($product_info->sale_price)}}</span>
                                        <span class="pdetails"><strong>{{__('Quantity :')}}</strong> {{$item['quantity']}}</span>
                                        @php $tax_amount = 0; @endphp
                                        @if(get_static_option('product_tax_type') == 'individual' && is_tax_enable())
                                            @php
                                                $percentage = !empty($product_info->tax_percentage) ? $product_info->tax_percentage : 0;
                                                $tax_amount = ($product_info->sale_price * $item['quantity']) / 100 * $product_info->tax_percentage;
                                            @endphp
                                            <span class="pdetails" style="color: red"><strong>{{__('Tax')}} {{'('.$percentage.'%) :'}}</strong> +{{amount_with_currency_symbol($tax_amount)}}</span>
                                        @endif
                                        <span class="pdetails"><strong>{{__('Subtotal :')}}</strong> {{amount_with_currency_symbol($product_info->sale_price * $item['quantity'] + $tax_amount )}}</span>
                                    </div>
                                </td>
                            </tr>
                            @else
                            <tr><td colspan="2"><div class="alert alert-warning">{{__('Product Removed')}}</div></td></tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </div>
    @endif
@endsection
@section('scripts')
<x-btn.work/>
@endsection