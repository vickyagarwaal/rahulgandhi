@include('frontend.partials.header')
<div class="header-style-01">
    <!-- topbar area -->
    @include('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number))
    <!-- navbar area -->
    @include('frontend.partials.navbar.navbar-home-04')
       

</div>
    <!-- Breadcrumb Area -->
  
@yield('content')
@include('frontend.partials.footer')