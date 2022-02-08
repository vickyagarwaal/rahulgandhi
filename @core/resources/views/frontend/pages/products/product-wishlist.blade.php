@extends('frontend.frontend-page-master')
@section('site-title')
    {{__('Product Wishlist')}}
@endsection
@section('page-title')
    {{__('Product Wishlist')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">
@endsection
@section('content')
    <section class="product-content-area padding-top-120 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.partials.message')
                   <div class="cart-wrapper">
                       <div class="cart-table-wrapper">
                           {!! render_wishlist_table() !!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('assets/common/js/toastr.min.js')}}"></script>
    <script>
        (function ($) {
            'use strict';
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
            $(document).on('click','.ajax_remove_wishlist_item',function (e) {
                e.preventDefault();
                var el = $(this);
                var productId = el.data('product_id');
                $.ajax({
                   url: "{{route('frontend.products.wishlist.ajax.remove')}}",
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
                       $('.cart-total-wrap').html(data.wishlist_total_markup);
                       $('.cart-table-wrapper').html(data.wishlist_table_markup);
                       var msg = "{{__('Item removed from Wishlist')}}";
                       toastr.error(msg);
                       $('.navbar-area .nav-container .nav-right-content ul li.wishlist-link .pcount').text(data.total_wishlist_item);
                     
                       if (!data.shipping_charge_status || $('.cart-table-wrapper table').length < 1){
                           $('.shipping-wrap').remove();
                       }
                   }
                });
            });
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
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i>{{__("Adding")}}');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fa fa-shopping-bag mr-1" aria-hidden="true"></i>'+"{{get_static_option('product_add_to_cart_button_text')}}");
                        //trigger remove wishlist button
                        $('.ajax_remove_wishlist_item[data-product_id="'+allData.product_id+'"]').trigger('click');
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
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount').text(data.total_cart_item);
                    }
                });
        });

        })(jQuery);
    </script>
@endsection
