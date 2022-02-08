<div class="header-style-01">
    @if(get_static_option('home_page_topbar_section_status'))
        @include('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number))
    @endif
    @if(get_static_option('home_page_navbar_section_status'))
        @include('frontend.partials.navbar.navbar-home-04')
    @endif
</div>


@if(get_static_option('home_page_featured_products_section_status'))
    @include('frontend.partials.featured-products')
@endif



@include('frontend.partials.ajax-product-home-functionality')