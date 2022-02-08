<div class="header-style-01">
    <?php if(get_static_option('home_page_topbar_section_status')): ?>
        <?php echo $__env->make('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(get_static_option('home_page_navbar_section_status')): ?>
        <?php echo $__env->make('frontend.partials.navbar.navbar-home-04', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>


<?php if(get_static_option('home_page_featured_products_section_status')): ?>
    <?php echo $__env->make('frontend.partials.featured-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<?php echo $__env->make('frontend.partials.ajax-product-home-functionality', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/home-pages/home-04.blade.php ENDPATH**/ ?>