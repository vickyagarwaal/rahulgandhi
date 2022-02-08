<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-dashboard-wrapper">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="mobile_nav">
                                <i class="fas fa-cogs"></i>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home.product.order')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home.product.order')); ?>"><?php echo e(get_static_option('product_page_name')); ?> <?php echo e(__('Orders')); ?></a>
                            </li>
                            <?php if(!empty(get_static_option('product_track_status'))): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(request()->routeIs('user.home.product.order.track') || request()->routeIs('user.home.product.order.track.query')): ?> active <?php endif; ?>" href="<?php echo e(route('user.home.product.order.track')); ?>"><?php echo e(__('Track Your Order')); ?></a>
                                </li>
                            <?php endif; ?>
                            
                           
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home.edit.profile')): ?> active <?php endif; ?> " href="<?php echo e(route('user.home.edit.profile')); ?>"><?php echo e(__('Edit Profile')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->routeIs('user.home.change.password')): ?> active <?php endif; ?> " href="<?php echo e(route('user.home.change.password')); ?>"><?php echo e(__('Change Password')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('user.logout')); ?>" onclick="event.preventDefault();
                                    jQuery('#userlogout-form-submit-btn').trigger('click');">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="userlogout-form" action="<?php echo e(route('user.logout')); ?>" method="POST"
                                      class="d-none">
                                    <?php echo csrf_field(); ?>
                                    <input type="submit" value="dd" id="userlogout-form-submit-btn" class="d- none">
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel">
                                <div class="message-show margin-top-10">
                                    <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('backend.partials.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <?php echo $__env->yieldContent('section'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
        "use strict";
                
        $(document).ready(function(){

            $(document).on('click','.user-dashboard-wrapper > ul .mobile_nav',function (e){
               e.preventDefault();
                var el = $(this);

                el.parent().toggleClass('show');

            });

        });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/user/dashboard/user-master.blade.php ENDPATH**/ ?>