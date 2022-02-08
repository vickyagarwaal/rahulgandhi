<?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="header-style-01">
    <!-- topbar area -->
    <?php echo $__env->make('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- navbar area -->
    <?php echo $__env->make('frontend.partials.navbar.navbar-home-04', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       

</div>
    <!-- Breadcrumb Area -->
  
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/frontend-page-master.blade.php ENDPATH**/ ?>