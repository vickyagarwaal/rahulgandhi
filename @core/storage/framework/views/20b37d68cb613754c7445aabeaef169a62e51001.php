<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php if(get_static_option('site_admin_dark_mode') == 'off'): ?>
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                <?php else: ?>
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                <?php endif; ?>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?php echo e(active_menu('admin-home')); ?>">
                        <a href="<?php echo e(route('admin.home')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo app('translator')->get('dashboard'); ?></span>
                        </a>
                    </li>
                    <?php if('super_admin' == auth()->guard('admin')->user()->role): ?>
                       
                        <li
                        class="main_dropdown
                        <?php if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])): ?> active <?php endif; ?>
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span><?php echo e(__('Manage Customers ')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/frontend/all-user')); ?>"><a
                                    href="<?php echo e(route('admin.all.frontend.user')); ?>"><?php echo e(__('All Customers')); ?></a></li>
                            <!--<li class="<?php echo e(active_menu('admin-home/frontend/new-user')); ?>"><a
                                    href="<?php echo e(route('admin.frontend.new.user')); ?>"><?php echo e(__('Add New User')); ?></a></li> -->
                        </ul>
                    </li>
                    <?php endif; ?>
           
             
            
                    <li class="main_dropdown
                    <?php echo e(active_menu('admin-home/products')); ?>

                    <?php if(request()->is('admin-home/products/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-gift"></i>
                            <span><?php echo e(__('Manage Products ')); ?> <span class="badge"><?php echo e($pending_product_order); ?></span></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/products')); ?>"><a
                                        href="<?php echo e(route('admin.products.all')); ?>"><?php echo e(__('All Products')); ?></a></li>
                            
                           
                           
                           
                            
                            
                           
                            
                            <li class="<?php echo e(active_menu('admin-home/products/product-order-logs')); ?>"><a
                                        href="<?php echo e(route('admin.products.order.logs')); ?>"><?php echo e(__('Orders')); ?> <span class="badge"><?php echo e($pending_product_order); ?></span></a>
                            </li>
                           
                            <li class="<?php echo e(active_menu('admin-home/products/product-ratings')); ?>"><a
                                        href="<?php echo e(route('admin.products.ratings')); ?>"><?php echo e(__('Ratings')); ?></a>
                            </li>
                            
                            
                           
                        </ul>
                    </li>
                
                    
                   <li class="<?php echo e(active_menu('admin-home/general-settings/payment-settings')); ?>"><a
                                             href="<?php echo e(route('admin.general.payment.settings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a></li>
                    
                    
                    

                     <?php if('super_admin' == auth()->guard('admin')->user()->role): ?>
                        <li class="
                        <?php echo e(active_menu('admin-home/new-user')); ?>

                        <?php echo e(active_menu('admin-home/all-user')); ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span><?php echo e(__('Admin Role Manage')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/all-user')); ?>"><a
                                            href="<?php echo e(route('admin.all.user')); ?>"><?php echo e(__('All Admin')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/new-user')); ?>"><a
                                            href="<?php echo e(route('admin.new.user')); ?>"><?php echo e(__('Add New Admin')); ?></a></li>
                            </ul>
                        </li>
                        
                    <?php endif; ?>

                   
                   
                    <?php if('super_admin' == auth()->guard('admin')->user()->role || 'admin' == auth()->guard('admin')->user()->role): ?>
                        <li class= "<?php if(request()->is('admin-home/general-settings/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                                <span><?php echo e(__('General Settings')); ?></span></a>
                            <ul class="collapse ">
                                <li class="<?php echo e(active_menu('admin-home/general-settings/site-identity')); ?>"><a
                                            href="<?php echo e(route('admin.general.site.identity')); ?>"><?php echo e(__('Site Identity')); ?></a>
                                </li>

                                
                                <li class="<?php echo e(active_menu('admin-home/general-settings/basic-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.basic.settings')); ?>"><?php echo e(__('Basic Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/typography-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.typography.settings')); ?>"><?php echo e(__('Typography Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/seo-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.seo.settings')); ?>"><?php echo e(__('SEO Settings')); ?></a>
                                </li>
                                
                                <li class="<?php echo e(active_menu('admin-home/general-settings/smtp-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a>
                                </li>
                              
                                
                               <!-- <li class="<?php echo e(active_menu('admin-home/general-settings/scripts')); ?>"><a
                                            href="<?php echo e(route('admin.general.scripts.settings')); ?>"><?php echo e(__('Third Party Scripts')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-template')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.template')); ?>"><?php echo e(__('Email Template')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.settings')); ?>"><?php echo e(__('Email Settings')); ?></a>
                                </li>

                               <li class="<?php echo e(active_menu('admin-home/general-settings/payment-settings')); ?>"><a
                                             href="<?php echo e(route('admin.general.payment.settings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/custom-css')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.css')); ?>"><?php echo e(__('Custom CSS')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/custom-js')); ?>"><a
                                            href="<?php echo e(route('admin.general.custom.js')); ?>"><?php echo e(__('Custom JS')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/gdpr-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.gdpr.settings')); ?>"><?php echo e(__('GDPR Compliant Cookies Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/popup-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.popup.settings')); ?>"><?php echo e(__('Popup Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/sitemap-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.sitemap.settings')); ?>"><?php echo e(__('Sitemap Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/license-setting')); ?>"><a
                                            href="<?php echo e(route('admin.general.license.settings')); ?>"><?php echo e(__('Licence Settings')); ?></a>
                                </li>

                                <li class="<?php echo e(active_menu('admin-home/general-settings/cache-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.cache.settings')); ?>"><?php echo e(__('Cache Settings')); ?></a>
                                </li> -->
                            </ul>
                        </li>
                        <!--<li class="<?php if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('admin.languages')); ?>" aria-expanded="true"><i class="ti-signal"></i>
                                <span><?php echo e(__('Languages')); ?></span></a>
                        </li> -->
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/partials/sidebar.blade.php ENDPATH**/ ?>