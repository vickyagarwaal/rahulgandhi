<x-quickview.modal/>
@section('scripts')
    <x-btn.add-cart/>
    <script>
        (function () {
            "use strict";
            $(document).on('click', '.wishlist', function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "{{route('frontend.products.add.to.wishlist.ajax')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        'product_id': allData.product_id,
                    },
                    beforeSend: function () {
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    success: function (data) {
                        el.html('<i class="fas fa-heart text-white"></i>');
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
                        var itemsContainer = $('.navbar-area .nav-container .nav-right-content ul li.wishlist-link .pcount');
                        var total = itemsContainer.text();
                        if (total < data.total_wishlist_item) {
                            toastr.success(data.msg);
                        } else {
                            toastr.info(data.msg);
                        }
                        itemsContainer.text(data.total_wishlist_item);
                    }
                });
            });

            $(document).on('click', '.ajax_add_to_cart', function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "{{route('frontend.products.add.to.cart.ajax')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        'product_id': allData.product_id,
                        'quantity': allData.product_quantity,
                    },
                    beforeSend: function () {
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i>{{__("working..")}}');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fa fa-shopping-bag mr-1" aria-hidden="true"></i>' + "{{get_static_option('product_add_to_cart_button_text')}}");
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
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount,.navbar-area .nav-container .mobile-cart .pcount').text(data.total_cart_item);
                    }
                });
            });

            $(document).on('click', '.quickview', function (e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                var el = $(this);
                $.ajax({
                    type: 'GET',
                    url: '{{route("frontend.products.quickview")}}',
                    data: {product_id: product_id},
                    beforeSend: function () {
                        $("#AppendQuickView").html('<div class="loader-2"></div>');
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    success: function (resp) {
                        el.html('<i class="far fa-eye text-white"></i>');
                        $("#AppendQuickView").html(resp.view);
                    }, error: function () {

                    }
                });
            });

            $(document).on('click', '.ajax_remove_wishlist_item', function (e) {
                e.preventDefault();
                var el = $(this);
                var productId = el.data('product_id');
                $.ajax({
                    url: "{{route('frontend.products.wishlist.ajax.remove')}}",
                    type: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        product_id: productId
                    },
                    success: function (data) {
                        el.html('<i class="far fa-heart text-white"></i>');
                        el.removeClass('ajax_remove_wishlist_item');
                        el.addClass('wishlist');
                        $('.navbar-area .nav-container .nav-right-content ul li.wishlist-link .pcount').text(data.total_wishlist_item);
                        $('.cart-total-wrap').html(data.wishlist_total_markup);
                        $('.cart-table-wrapper').html(data.wishlist_table_markup);
                        var msg = "{{__('Item removed from Wishlist')}}";
                        toastr.error(msg);
                    }
                });
            });
        })(jQuery);
    </script>
@endsection