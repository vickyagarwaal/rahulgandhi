<nav class="navbar navbar-area navbar-expand-lg has-topbar-04 bg-white nav-style-02">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="<?php echo e(route('homepage')); ?>" class="logo">
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                </a>
            </div>
            <div class="mobile-cart"><a href="<?php echo e(route('frontend.products.cart')); ?>"><i class="flaticon-shopping-cart"></i> <span class="pcount"><?php echo e(cart_total_items()); ?></span></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    </div>
    <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                
    <li> 
        <a href="<?php echo e(url('/')); ?>">Home</a>
</li>
<li> 
        <a href="<?php echo e(url('/product')); ?>">CBD OIL TINCTURES</a>
</li>
    



<li class=" menu-item-has-children "> 
        <a href="#">User</a>
<ul class="sub-menu">
<?php if(!Auth::check()): ?>
    <li><a href="<?php echo e(url('/login')); ?>">Login </li>
        <li><a href="<?php echo e(url('/register')); ?>">Regsiter </li>

            <?php else: ?>
     <li><a href="<?php echo e(url('/user-home')); ?>">Dashboard</a></li>
                  <?php endif; ?>

</ul>
</li>
    
            </ul>
        </div>
      
        <div class="nav-right-content">
            <div class="icon-part">
                <ul>
                    <?php echo \App\Helpers\RenderHelpers::wishlistCountMarkup(); ?>

                    <?php echo \App\Helpers\RenderHelpers::cartCountMarkup(); ?>

                </ul>
            </div>
        </div>
    </div>
</nav>



<?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/frontend/partials/navbar/navbar-home-04.blade.php ENDPATH**/ ?>