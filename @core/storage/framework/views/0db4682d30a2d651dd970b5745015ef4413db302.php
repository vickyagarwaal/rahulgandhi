<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.quickview.modal','data' => []]); ?>
<?php $component->withName('quickview.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.add-cart','data' => []]); ?>
<?php $component->withName('btn.add-cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <script>
        (function () {
            "use strict";
            $(document).on('click', '.wishlist', function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url: "<?php echo e(route('frontend.products.add.to.wishlist.ajax')); ?>",
                    type: "POST",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
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
                    url: "<?php echo e(route('frontend.products.add.to.cart.ajax')); ?>",
                    type: "POST",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        'product_id': allData.product_id,
                        'quantity': allData.product_quantity,
                    },
                    beforeSend: function () {
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i><?php echo e(__("working..")); ?>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fa fa-shopping-bag mr-1" aria-hidden="true"></i>' + "<?php echo e(get_static_option('product_add_to_cart_button_text')); ?>");
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
                    url: '<?php echo e(route("frontend.products.quickview")); ?>',
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
                    url: "<?php echo e(route('frontend.products.wishlist.ajax.remove')); ?>",
                    type: "POST",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        product_id: productId
                    },
                    success: function (data) {
                        el.html('<i class="far fa-heart text-white"></i>');
                        el.removeClass('ajax_remove_wishlist_item');
                        el.addClass('wishlist');
                        $('.navbar-area .nav-container .nav-right-content ul li.wishlist-link .pcount').text(data.total_wishlist_item);
                        $('.cart-total-wrap').html(data.wishlist_total_markup);
                        $('.cart-table-wrapper').html(data.wishlist_table_markup);
                        var msg = "<?php echo e(__('Item removed from Wishlist')); ?>";
                        toastr.error(msg);
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/ajax-product-home-functionality.blade.php ENDPATH**/ ?>