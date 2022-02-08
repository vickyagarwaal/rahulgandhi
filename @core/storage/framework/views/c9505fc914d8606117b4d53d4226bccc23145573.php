<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('product_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('product_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('product_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('product_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.all','data' => []]); ?>
<?php $component->withName('msg.all'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                </div>
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-archive-top-content-area">
                                <div class="search-form">
                                    <input type="text" class="form-control" id="search_term" placeholder="<?php echo e(__('Search..')); ?>" value="<?php echo e($search_term); ?>">
                                    <button type="button" id="product_search_btn"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="product-sorting">
                                    <select id="product_sorting_select">
                                        <option value="default" <?php if($selected_order == '' || $selected_order == 'default'): ?> selected <?php endif; ?> ><?php echo e(__('Newest Product')); ?></option>
                                        <option value="old" <?php if($selected_order == 'old'): ?> selected <?php endif; ?> ><?php echo e(__('Oldest Product')); ?></option>
                                        <option value="high_low" <?php if($selected_order == 'high_low'): ?> selected <?php endif; ?> ><?php echo e(__('Highest To Lowest')); ?></option>
                                        <option value="low_high" <?php if($selected_order == 'low_high'): ?> selected <?php endif; ?> ><?php echo e(__('Lowest To Highest')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php if(count($all_products) > 0): ?>
                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 margin-bottom-40">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.single','data' => ['id' => $data->id,'badge' => $data->badge,'image' => $data->image,'title' => $data->title,'slug' => $data->slug,'subCategoryId' => $data->sub_category_id,'salePrice' => $data->sale_price,'regularPrice' => $data->regular_price,'category' => $data->category]]); ?>
<?php $component->withName('frontend.product.single'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->id),'badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->badge),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->image),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->title),'slug' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->slug),'subCategoryId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->sub_category_id),'salePrice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->sale_price),'regularPrice' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->regular_price),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->category)]); ?>
                                 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 text-center">
                            <nav class="pagination-wrapper " aria-label="Page navigation ">
                                <?php echo e($all_products->links()); ?>

                            </nav>
                        </div>
                        <?php else: ?>
                        <div class="col-lg-12 text-center">
                            <div class="alert alert-warning"><?php echo e(__('No Products Found')); ?> </div>
                         </div>
                        <?php endif; ?>
                    </div>
                </div>
           
            </div>
        </div>
    </section>
    <form id="product_search_form" class="d-none"  action="<?php echo e(route('frontend.products')); ?>" method="get">
        <input type="hidden" id="search_query" name="q" value="<?php echo e($search_term); ?>">
        <input type="hidden" id="min_price" name="min_price" value="<?php echo e($min_price); ?>">
        <input type="hidden" id="max_price" name="max_price" value="<?php echo e($max_price); ?>">
        <input type="hidden" name="cat_id" id="category_id" value="<?php echo e($selected_category); ?>">
        <input type="hidden" name="orderby" id="orderby" value="<?php echo e($selected_order ? $selected_order : 'default'); ?>">
        <input type="hidden" name="rating" id="review" value="<?php echo e($selected_rating); ?>">
        <button id="product_hidden_form_submit_button" type="submit"></button>
    </form>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.quickview.js','data' => []]); ?>
<?php $component->withName('quickview.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
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
            //wishlist
            $(document).on('click','#wishlist',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "<?php echo e(route('frontend.products.add.to.wishlist.ajax')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        'product_id' : allData.product_id,
                    },
                    beforeSend: function(){
                            el.addClass("disabled")
                            el.html('<i class="fas fa-spinner fa-spin text-white"></i>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
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
            //quickview
            $(document).on('click','.quickview',function (e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                $.ajax({
                        type:'GET',
                        url:  '<?php echo e(route("frontend.products.quickview")); ?>',
                        data: {product_id:product_id},
                        beforeSend: function(){
                            $("#AppendQuickView").html('<div class="loader-2"></div>');
                        },
                        success: function(resp){
                            $("#AppendQuickView").html(resp.view);
                        },error: function(){
                        }
                });
            });
            //search form trigger
            $(document).on('click','#product_search_btn',function (e) {
                e.preventDefault();
                var searchTerms = $('#search_term').val();
                $('#search_query').val(searchTerms)
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change','#product_sorting_select',function (e) {
                var sortVal = $('#product_sorting_select').val();
                $('#orderby').val(sortVal);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click','.product_category_list > li a',function (e) {
                e.preventDefault();
                var catID = $(this).data('catid');
                $('#category_id').val(catID);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change','input[name="ratings_val"]',function (e) {
                e.preventDefault();
                $('#review').val($(this).val());
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click','#submit_price_filter_btn',function (e) {
                e.preventDefault();
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: "<?php echo e($maximum_available_price); ?>",
                values: [ "<?php echo e($min_price); ?>", "<?php echo e($max_price); ?>" ],
                slide: function( event, ui ) {
                    var min_price = ui.values[ 0 ];
                    var max_price = ui.values[ 1 ];
                    var siteGlobalCurrency = "<?php echo e(site_currency_symbol()); ?>";
                    $('.min_filter_price').text(siteGlobalCurrency+min_price);
                    $('.max_filter_price').text(siteGlobalCurrency+max_price);
                    $('#min_price').val(min_price);
                    $('#max_price').val(max_price);
                }
            });

            $(document).on('click','.ajax_add_to_cart',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "<?php echo e(route('frontend.products.add.to.cart.ajax')); ?>",
                    type: "POST",
                    data: {
                        _token : "<?php echo e(csrf_token()); ?>",
                        'product_id' : allData.product_id,
                        'quantity' : allData.product_quantity,
                    },
                    beforeSend: function(){
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i><?php echo e(__("Adding")); ?>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fa fa-shopping-bag mr-1" aria-hidden="true"></i>'+"<?php echo e(get_static_option('product_add_to_cart_button_text')); ?>");
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
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount,.mobile-cart a .pcount').text(data.total_cart_item);
                    }
                });
            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/pages/products/products.blade.php ENDPATH**/ ?>