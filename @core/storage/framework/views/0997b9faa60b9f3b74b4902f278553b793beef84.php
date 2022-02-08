<?php $__env->startSection('section'); ?>
    <div class="row">
            <div class="col-lg-6">
                <div class="user-dashboard-card">
                    <div class="icon"><i class="fas fa-shopping-bag"></i></div>
                    <div class="content">
                        <h4 class="title"><?php echo e(get_static_option('product_page_name')); ?> <?php echo e(__('Order')); ?></h4>
                        <span class="number"><?php echo e($product_orders); ?></span>
                    </div>
                </div>
            </div>
            
            
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/user/dashboard/user-home.blade.php ENDPATH**/ ?>