<!DOCTYPE html>
<html lang="{{get_default_language()}}" dir="{{get_default_language_direction()}}">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    <!-- load fonts dynamically -->
    <!-- favicon -->
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    <!-- animate -->
    <link rel='stylesheet' id='googleWebFonts-css'  href='https://fonts.googleapis.com/css2?family=Abel&#038;ver=5.5.6#038;display=swap&#038;ver=5.5.5' type='text/css' media='all' />
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <!-- fontawesome support -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/fontawesome.min.css')}}">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/flaticon.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/custom-style.css') }}">
    <!-- Dynamic CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.ihavecookies.css')}}">
    <!-- Toaster CSS -->
    <link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">
    <!-- JQUERY  -->
    <script src="{{asset('assets/common/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/common/js/jquery-migrate-3.3.2.min.js')}}"></script>
    <!-- Site Root Style  -->
    @yield('style')
    @include('frontend.partials.root-style')
    @include('frontend.partials.og-meta')
   

    {!! filter_static_option_value('site_third_party_tracking_code') !!}
</head>

<body>
    <!-- preloader area start -->
    @if(!empty(get_static_option('site_loader_animation')))
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader">
                <span class="loader-inner-1"></span>
                <span class="loader-inner-2"></span>
                <span class="loader-inner-3"></span>
                <span class="loader-inner-4"></span>
            </div>
        </div>
    </div>
    @endif
    <!-- preloader area end -->