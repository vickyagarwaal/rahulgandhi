<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.home')}}">
                @if(get_static_option('site_admin_dark_mode') == 'off')
                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                @else
                {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                @endif
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('dashboard')</span>
                        </a>
                    </li>
                    @if('super_admin' == auth()->guard('admin')->user()->role)
                       
                        <li
                        class="main_dropdown
                        @if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{__('Manage Customers ')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/frontend/all-user')}}"><a
                                    href="{{route('admin.all.frontend.user')}}">{{__('All Customers')}}</a></li>
                            <!--<li class="{{active_menu('admin-home/frontend/new-user')}}"><a
                                    href="{{route('admin.frontend.new.user')}}">{{__('Add New User')}}</a></li> -->
                        </ul>
                    </li>
                    @endif
           
             
            
                    <li class="main_dropdown
                    {{active_menu('admin-home/products')}}
                    @if(request()->is('admin-home/products/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-gift"></i>
                            <span>{{__('Manage Products ')}} <span class="badge">{{$pending_product_order}}</span></span>
                        </a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/products')}}"><a
                                        href="{{route('admin.products.all')}}">{{__('All Products')}}</a></li>
                            
                           
                           
                           
                            
                            
                           
                            
                            <li class="{{active_menu('admin-home/products/product-order-logs')}}"><a
                                        href="{{route('admin.products.order.logs')}}">{{__('Orders')}} <span class="badge">{{$pending_product_order}}</span></a>
                            </li>
                           
                            <li class="{{active_menu('admin-home/products/product-ratings')}}"><a
                                        href="{{route('admin.products.ratings')}}">{{__('Ratings')}}</a>
                            </li>
                            
                            
                           
                        </ul>
                    </li>
                
                    
                   <li class="{{active_menu('admin-home/general-settings/payment-settings')}}"><a
                                             href="{{route('admin.general.payment.settings')}}">{{__('Payment Gateway Settings')}}</a></li>
                    
                    
                    {{-- @medheal end--}}

                     @if('super_admin' == auth()->guard('admin')->user()->role)
                        <li class="
                        {{active_menu('admin-home/new-user')}}
                        {{active_menu('admin-home/all-user')}}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span>{{__('Admin Role Manage')}}</span></a>
                            <ul class="collapse">
                                <li class="{{active_menu('admin-home/all-user')}}"><a
                                            href="{{route('admin.all.user')}}">{{__('All Admin')}}</a></li>
                                <li class="{{active_menu('admin-home/new-user')}}"><a
                                            href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>
                            </ul>
                        </li>
                        
                    @endif

                   
                   
                    @if('super_admin' == auth()->guard('admin')->user()->role || 'admin' == auth()->guard('admin')->user()->role)
                        <li class= "@if(request()->is('admin-home/general-settings/*')) active @endif">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                                <span>{{__('General Settings')}}</span></a>
                            <ul class="collapse ">
                                <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a
                                            href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a>
                                </li>

                                
                                <li class="{{active_menu('admin-home/general-settings/basic-settings')}}"><a
                                            href="{{route('admin.general.basic.settings')}}">{{__('Basic Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/typography-settings')}}"><a
                                            href="{{route('admin.general.typography.settings')}}">{{__('Typography Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a
                                            href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a>
                                </li>
                                
                                <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a
                                            href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a>
                                </li>
                              
                                
                               <!-- <li class="{{active_menu('admin-home/general-settings/scripts')}}"><a
                                            href="{{route('admin.general.scripts.settings')}}">{{__('Third Party Scripts')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/email-template')}}"><a
                                            href="{{route('admin.general.email.template')}}">{{__('Email Template')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/email-settings')}}"><a
                                            href="{{route('admin.general.email.settings')}}">{{__('Email Settings')}}</a>
                                </li>

                               <li class="{{active_menu('admin-home/general-settings/payment-settings')}}"><a
                                             href="{{route('admin.general.payment.settings')}}">{{__('Payment Gateway Settings')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/custom-css')}}"><a
                                            href="{{route('admin.general.custom.css')}}">{{__('Custom CSS')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/custom-js')}}"><a
                                            href="{{route('admin.general.custom.js')}}">{{__('Custom JS')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/gdpr-settings')}}"><a
                                            href="{{route('admin.general.gdpr.settings')}}">{{__('GDPR Compliant Cookies Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/popup-settings')}}"><a
                                            href="{{route('admin.general.popup.settings')}}">{{__('Popup Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/sitemap-settings')}}"><a
                                            href="{{route('admin.general.sitemap.settings')}}">{{__('Sitemap Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/license-setting')}}"><a
                                            href="{{route('admin.general.license.settings')}}">{{__('Licence Settings')}}</a>
                                </li>

                                <li class="{{active_menu('admin-home/general-settings/cache-settings')}}"><a
                                            href="{{route('admin.general.cache.settings')}}">{{__('Cache Settings')}}</a>
                                </li> -->
                            </ul>
                        </li>
                        <!--<li class="@if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ) active @endif">
                            <a href="{{route('admin.languages')}}" aria-expanded="true"><i class="ti-signal"></i>
                                <span>{{__('Languages')}}</span></a>
                        </li> -->
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
