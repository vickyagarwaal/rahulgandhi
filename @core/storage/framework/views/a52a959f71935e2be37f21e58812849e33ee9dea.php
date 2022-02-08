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
                        <li
                        class="main_dropdown
                        <?php if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])): ?> active <?php endif; ?>
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span><?php echo e(__('Users Manage')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/frontend/all-user')); ?>"><a
                                    href="<?php echo e(route('admin.all.frontend.user')); ?>"><?php echo e(__('All Users')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/frontend/new-user')); ?>"><a
                                    href="<?php echo e(route('admin.frontend.new.user')); ?>"><?php echo e(__('Add New User')); ?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </li>
                <li class="main_dropdown <?php if(request()->is('admin-home/appointment/*')): ?> active <?php endif; ?> ">
                    <a href="javascript:void(0)" aria-expanded="true">
                        <i class="ti-timer"></i><span><?php echo e(__('Appointments')); ?> <span class="badge"><?php echo e($pending_appointment); ?></span></span></a>
                    <ul class="collapse">
                        <li class="<?php echo e(active_menu('admin-home/appointment/all')); ?>  <?php if(request()->is('admin-home/appointment/edit/*')): ?> active <?php endif; ?>  ">
                            <a href="<?php echo e(route('admin.appointment.all')); ?>"><?php echo e(__('All Doctors')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/new')); ?>">
                            <a href="<?php echo e(route('admin.appointment.new')); ?>"><?php echo e(__('New Doctor')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/category')); ?>">
                         <li class="<?php echo e(active_menu('admin-home/appointment/appointment-search')); ?>">
                             <a href="<?php echo e(route('admin.appointment.search')); ?>"><?php echo e(__('Search Doctor')); ?></a></li>
                         <li class="<?php echo e(active_menu('admin-home/appointment/category')); ?>">
                             <a href="<?php echo e(route('admin.appointment.category.all')); ?>"><?php echo e(__('Doctors Category')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/booking-time')); ?>">
                            <a href="<?php echo e(route('admin.appointment.booking.time.all')); ?>"><?php echo e(__('Booking Time')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/booking')); ?>">
                            <a href="<?php echo e(route('admin.appointment.booking.all')); ?>"><?php echo e(__('All Booking')); ?> <span class="badge"><?php echo e($pending_appointment); ?></span></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/review')); ?>">
                            <a href="<?php echo e(route('admin.appointment.review.all')); ?>"><?php echo e(__('All Reviews')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/form-builder')); ?>">
                            <a href="<?php echo e(route('admin.appointment.booking.form.builder')); ?>"><?php echo e(__('Booking Form Builder')); ?></a></li>
                        <li class="<?php echo e(active_menu('admin-home/appointment/settings')); ?>">
                            <a href="<?php echo e(route('admin.appointment.booking.settings')); ?>"><?php echo e(__('Settings')); ?></a></li>
                    </ul>
                </li>
                <li class="main_dropdown
                    <?php if(request()->is(['admin-home/prescription/*'])): ?>
                        active
                    <?php endif; ?>
                    ">
                    <a href="javascript:void(0)"
                       aria-expanded="true">
                        <i class="ti-files"></i>
                        <span><?php echo e(__('Prescriptions')); ?> <span class="badge"><?php echo e($pending_prescription); ?></span></span>
                    </a>
                    <ul class="collapse">
                        <li class="<?php echo e(active_menu('admin-home/prescription/all')); ?>">
                            <a href="<?php echo e(route('admin.prescription.all')); ?>"><?php echo e(__('All Prescription')); ?> <span class="badge"><?php echo e($pending_prescription); ?></span></a></li>
                        <li class="<?php echo e(active_menu('admin-home/prescription/settings')); ?>">
                            <a href="<?php echo e(route('admin.prescription.settings')); ?>"><?php echo e(__('Settings')); ?></a></li>
                    </ul>
                </li>
                <li class="main_dropdown
                    <?php if(request()->is(['admin-home/services/*','admin-home/services'])): ?> active <?php endif; ?>
                    ">
                        <a href="javascript:void(0)"
                           aria-expanded="true">
                            <i class="ti-headphone-alt"></i>
                            <span><?php echo e(__('Services')); ?></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/services')); ?>"><a
                                    href="<?php echo e(route('admin.services')); ?>"><?php echo e(__('All Services')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services/new')); ?>"><a
                                    href="<?php echo e(route('admin.services.new')); ?>"><?php echo e(__('New Service')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services/category')); ?>"><a
                                    href="<?php echo e(route('admin.service.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services/page-settings')); ?>"><a
                                    href="<?php echo e(route('admin.services.page.settings')); ?>"><?php echo e(__('Service Page')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services/single-page-settings')); ?>"><a
                                    href="<?php echo e(route('admin.services.single.page.settings')); ?>"><?php echo e(__('Service Single Page')); ?></a></li>
                        </ul>
                    </li>
                    <li class="main_dropdown
                    <?php echo e(active_menu('admin-home/products')); ?>

                    <?php if(request()->is('admin-home/products/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-gift"></i>
                            <span><?php echo e(__('Products Manage')); ?> <span class="badge"><?php echo e($pending_product_order); ?></span></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/products')); ?>"><a
                                        href="<?php echo e(route('admin.products.all')); ?>"><?php echo e(__('All Products')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/products/new')); ?>"><a
                                        href="<?php echo e(route('admin.products.new')); ?>"><?php echo e(__('Add New Product')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/products/category')); ?>"><a
                                        href="<?php echo e(route('admin.products.category.all')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/products/shipping')); ?>"><a
                                        href="<?php echo e(route('admin.products.shipping.all')); ?>"><?php echo e(__('Shipping')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/products/coupon')); ?>"><a
                                        href="<?php echo e(route('admin.products.coupon.all')); ?>"><?php echo e(__('Coupon')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/products/page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.products.page.settings')); ?>"><?php echo e(__('Product Page Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/single-page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.products.single.page.settings')); ?>"><?php echo e(__('Product Single Page Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/success-page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.products.success.page.settings')); ?>"><?php echo e(__('Order Success Page Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/cancel-page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.products.cancel.page.settings')); ?>"><?php echo e(__('Order Cancel Page Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/order-track-page-settings')); ?>"><a
                                        href="<?php echo e(route('admin.products.track.page.settings')); ?>"><?php echo e(__('Order Track Page Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/product-order-logs')); ?>"><a
                                        href="<?php echo e(route('admin.products.order.logs')); ?>"><?php echo e(__('Orders')); ?> <span class="badge"><?php echo e($pending_product_order); ?></span></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/order-create')); ?>"><a
                                        href="<?php echo e(route('admin.product.order.create')); ?>"><?php echo e(__('Create Order')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/product-ratings')); ?>"><a
                                        href="<?php echo e(route('admin.products.ratings')); ?>"><?php echo e(__('Ratings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/order-report')); ?>">
                                <a href="<?php echo e(route('admin.products.order.report')); ?>"><?php echo e(__('Order Report')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/tax-settings')); ?>">
                                <a href="<?php echo e(route('admin.products.tax.settings')); ?>"><?php echo e(__('Tax Settings')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/products/import')); ?>">
                                <a href="<?php echo e(route('admin.products.import')); ?>"><?php echo e(__('Import')); ?></a>
                            </li>
                        </ul>
                    </li>
                <li class=" <?php echo e(active_menu('admin-home/blog')); ?>

                            <?php echo e(active_menu('admin-home/blog-category')); ?>

                            <?php echo e(active_menu('admin-home/new-blog')); ?>

                            <?php echo e(active_menu('admin-home/blog-page-settings')); ?>

                            <?php if(request()->is('admin-home/blog-edit/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comment-alt"></i>
                            <span><?php echo e(__('Blog')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/blog')); ?> <?php if(request()->is('admin-home/blog-edit/*')): ?> active <?php endif; ?>"><a
                                        href="<?php echo e(route('admin.blog')); ?>"><?php echo e(__('All Blog')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/blog-category')); ?>"><a
                                        href="<?php echo e(route('admin.blog.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/new-blog')); ?>"><a
                                        href="<?php echo e(route('admin.blog.new')); ?>"><?php echo e(__('Add New Post')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/blog-page-settings')); ?>"><a 
                                        href="<?php echo e(route('admin.blog.page')); ?>" aria-expanded="true"><?php echo e(__('Blog Page Settings')); ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/page')); ?>

                        <?php echo e(active_menu('admin-home/new-page')); ?>

                        <?php if(request()->is('admin-home/page-edit/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span><?php echo e(__('Pages')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/page')); ?> <?php if(request()->is('admin-home/page-edit/*')): ?> active <?php endif; ?>"><a
                                        href="<?php echo e(route('admin.page')); ?>"><?php echo e(__('All Pages')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/new-page')); ?>"><a
                                        href="<?php echo e(route('admin.page.new')); ?>"><?php echo e(__('Add New Page')); ?></a></li>
                        </ul>
                    </li>
                    
                    
                    <li class="<?php echo e(active_menu('admin-home/medical-care-info')); ?>">
                        <a href="<?php echo e(route('admin.medical.care')); ?>"><i class="ti-control-forward"></i> <span><?php echo e(__('Medical Care Info')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/testimonial')); ?>">
                        <a href="<?php echo e(route('admin.testimonial')); ?>"><i class="ti-control-forward"></i> <span><?php echo e(__('Testimonial')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/counterup')); ?>">
                        <a href="<?php echo e(route('admin.counterup')); ?>"><i class="ti-control-forward"></i> <span><?php echo e(__('Counterup')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/keyfeatures')); ?>">
                        <a href="<?php echo e(route('admin.keyfeatures')); ?>"><i class="ti-control-forward"></i> <span><?php echo e(__('Key Features')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/faq')); ?>">
                        <a href="<?php echo e(route('admin.faq')); ?>"><i class="ti-control-forward"></i> <span><?php echo e(__('Faq')); ?></span></a>
                    </li>
                    
                    <li class="main_dropdown <?php if(request()->is([
                            'admin-home/topbar-settings',
                            'admin-home/infobar-settings',
                            'admin-home/navbar-settings',
                            'admin-home/media-upload/page',
                            'admin-home/home-variant',
                            'admin-home/menu',
                            'admin-home/popup-builder/all',
                            'admin-home/widgets',
                            'admin-home/menu-edit/*',
                            'admin-home/form-builder/*',
                        ])): ?> active
                        <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i>
                            <span><?php echo e(__('Appearance Settings')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/topbar-settings')); ?>">
                                <a href="<?php echo e(route('admin.topbar.settings')); ?>">
                                    <?php echo e(__('Topbar Settings')); ?>

                                </a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/infobar-settings')); ?>">
                                <a href="<?php echo e(route('admin.infobar.settings')); ?>">
                                    <?php echo e(__('Infobar Settings')); ?>

                                </a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/navbar-settings')); ?>">
                                <a href="<?php echo e(route('admin.navbar.settings')); ?>"
                                   aria-expanded="true">
                                    <?php echo e(__('Nabvar Settings')); ?>

                                </a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/media-upload/page')); ?>">
                                <a href="<?php echo e(route('admin.upload.media.images.page')); ?>"
                                   aria-expanded="true">
                                    <?php echo e(__('Media Images Manage')); ?>

                                </a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/home-variant')); ?>">
                                <a href="<?php echo e(route('admin.home.variant')); ?>"
                                   aria-expanded="true">
                                  <?php echo e(__('Home Variant')); ?>

                                </a>
                            </li>
                            <li class="main_dropdown <?php if(request()->is('admin-home/form-builder/*')): ?> active <?php endif; ?>">
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <?php echo e(__('Form Builder')); ?></a>
                                <ul class="collapse">
                                    <li class="<?php echo e(active_menu('admin-home/form-builder/contact-form')); ?>">
                                        <a href="<?php echo e(route('admin.form.builder.contact')); ?>"><?php echo e(__('Contact Form')); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/widgets')); ?>"><a
                                href="<?php echo e(route('admin.widgets')); ?>"><?php echo e(__('Widget Builder')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/menu')); ?>

                            <?php if(request()->is('admin-home/menu-edit/*')): ?> active <?php endif; ?>">
                                <a href="<?php echo e(route('admin.menu')); ?>"><?php echo e(__('Menu Manage')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/popup-builder/all')); ?>">
                                <a href="<?php echo e(route('admin.popup.builder.all')); ?>"><?php echo e(__('Popup Builder')); ?></a></li>
                        </ul>
                    </li>
                    <li class="main_dropdown
                        <?php if(request()->is([
                            'admin-home/home-page/*',
                            'admin-home/about-page/*',
                            'admin-home/contact-page/*',
                            'admin-home/services-page/*',
                            'admin-home/404-page-manage',
                            'admin-home/maintains-page/settings',
                            'admin-home/faq-page-settings',
                        ])): ?> active <?php endif; ?> ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-panel"></i>
                            <span><?php echo e(__('All Page Settings')); ?></span></a>
                        <ul class="collapse">
                            <li class="main_dropdown  <?php if(request()->is('admin-home/home-page/*')): ?> active <?php endif; ?>">
                                <a href="javascript:void(0)"
                                   aria-expanded="true"><?php echo e(__('Home Page Manage')); ?>

                                </a>
                                <ul class="collapse">
                                    
                                    <?php if($home_page_variant_number == '01'): ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/header-slider')); ?>">
                                        <a href="<?php echo e(route('admin.home.header.slider')); ?>"><?php echo e(__('Header Slider')); ?></a>
                                    </li>
                                    <?php else: ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/header-slider-static')); ?>">
                                        <a href="<?php echo e(route('admin.home.header.slider.static')); ?>"><?php echo e(__('Header Slider')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($home_page_variant_number != '02'): ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/header-bottom')); ?>">
                                        <a href="<?php echo e(route('admin.home.header.bottom')); ?>"><?php echo e(__('Header Bottom Area')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($home_page_variant_number == '01'): ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/medical-care-info-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.medical.care')); ?>"><?php echo e(__('Medical Care Info Area')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/testimonial-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.testimonial')); ?>"><?php echo e(__('Testimonial Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/concern-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.concern')); ?>"><?php echo e(__('Concern Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/latest-blog-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.blog.latest')); ?>"><?php echo e(__('Latest Blog Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/appointment-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.appointment')); ?>"><?php echo e(__('Appointment Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/what-we-do-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.what.we.do')); ?>"><?php echo e(__('What We Do Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/expert-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.expert.area')); ?>"><?php echo e(__('Expert Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/call-to-us-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.call.to.us')); ?>"><?php echo e(__('Call to Us Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/special-offer-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.special.offer')); ?>"><?php echo e(__('Special Offer Area')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/product-by-category-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.product.category')); ?>"><?php echo e(__('Product Category')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/popular-product-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.popular.product')); ?>"><?php echo e(__('Popular Product')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/featured-product-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.featured.product')); ?>"><?php echo e(__('Featured Product')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/best-seller-product-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.home.best.seller.product')); ?>"><?php echo e(__('Best Seller Product')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/home-page/section-manage')); ?>">
                                        <a href="<?php echo e(route('admin.home.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="main_dropdown <?php if(request()->is('admin-home/about-page/*')  ): ?> active <?php endif; ?> ">
                                <a href="javascript:void(0)" aria-expanded="true">
                                   <?php echo e(__('About Page Manage')); ?>

                                </a>
                                <ul class="collapse">
                                    
                                    <li class="<?php echo e(active_menu('admin-home/about-page/concern-area-settings')); ?>">
                                        <a href="<?php echo e(route('admin.about.concern')); ?>"><?php echo e(__('Concern Area')); ?></a></li>
                                    <li class="<?php echo e(active_menu('admin-home/about-page/progressbar')); ?>"><a
                                        href="<?php echo e(route('admin.about.progressbar')); ?>"><?php echo e(__('Progressbar Section')); ?></a></li>
                                    <li class="<?php echo e(active_menu('admin-home/about-page/section-manage')); ?>"><a
                                                href="<?php echo e(route('admin.about.page.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="main_dropdown <?php if(request()->is('admin-home/contact-page/*')  ): ?> active <?php endif; ?>">
                                <a href="javascript:void(0)" aria-expanded="true">
                                   <?php echo e(__('Contact Page Manage')); ?>

                                </a>
                                <ul class="collapse">
                                    <li class="<?php echo e(active_menu('admin-home/contact-page/settings')); ?>">
                                        <a href="<?php echo e(route('admin.contact.page.settings')); ?>"><?php echo e(__('Contact Page')); ?></a>
                                    </li>
                                    <li class="<?php echo e(active_menu('admin-home/contact-page/section-manage')); ?>">
                                        <a href="<?php echo e(route('admin.contact.page.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/faq-page-settings')); ?>">
                                <a href="<?php echo e(route('admin.home.faq')); ?>"><?php echo e(__('Faq Page')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/404-page-manage')); ?>">
                                <a href="<?php echo e(route('admin.404.page.settings')); ?>"><?php echo e(__('404 Page Manage')); ?></a>
                            </li>
                            <li class="<?php echo e(active_menu('admin-home/maintains-page/settings')); ?>">
                                <a href="<?php echo e(route('admin.maintains.page.settings')); ?>"><?php echo e(__('Maintain Page Manage')); ?></a>
                            </li>
                        </ul>
                    </li>
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
                                <li class="<?php echo e(active_menu('admin-home/general-settings/scripts')); ?>"><a
                                            href="<?php echo e(route('admin.general.scripts.settings')); ?>"><?php echo e(__('Third Party Scripts')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-template')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.template')); ?>"><?php echo e(__('Email Template')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/email-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.email.settings')); ?>"><?php echo e(__('Email Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/smtp-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/general-settings/page-settings')); ?>"><a
                                            href="<?php echo e(route('admin.general.page.settings')); ?>"><?php echo e(__('Page Settings')); ?></a></li>
                                
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
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('admin.languages')); ?>" aria-expanded="true"><i class="ti-signal"></i>
                                <span><?php echo e(__('Languages')); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/backend/partials/sidebar2.blade.php ENDPATH**/ ?>