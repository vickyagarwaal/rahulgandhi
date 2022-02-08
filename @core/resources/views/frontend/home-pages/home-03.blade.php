<div class="header-style-01">
    @if(get_static_option('home_page_topbar_section_status'))
        @include('frontend.partials.topbar-variant.topbar-variant-'.get_static_option('topbar_variant_home_'.$home_variant_number))
    @endif
    @if(get_static_option('home_page_infobar_section_status'))
        @include('frontend.partials.infobar')
    @endif
    @if(get_static_option('home_page_navbar_section_status'))
        @include('frontend.partials.navbar.navbar-home-03')
    @endif
</div>
@if(get_static_option('home_page_header_slider_section_status'))
    <div class="header-slider home-varaint-{{$home_variant_number}}">
        <div class="header-area style-02 header-bg" {!! render_background_image_markup_by_attachment_id(get_static_option('header_slider_home_'.$home_variant_number.'_static_image')) !!}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-inner-02">
                            <!-- header inner -->
                            <p>{{get_static_option('header_slider_home_'.$home_variant_number.'_static_details')}}</p>
                            <h1 class="title">{{get_static_option('header_slider_home_'.$home_variant_number.'_static_title')}}</h1>
                            <p class="subtitle">{{get_static_option('header_slider_home_'.$home_variant_number.'_static_subtitle')}}</p>
                            @if(!empty('header_slider_home_'.$home_variant_number.'_static_btn_status'))
                            <div class="btn-wrapper">
                                <a href="{{get_static_option('header_slider_home_'.$home_variant_number.'_static_btn_url')}} " class="boxed-btn">{{get_static_option('header_slider_home_'.$home_variant_number.'_static_btn_title')}}</a>
                            </div>
                            @endif
                        </div>
                        <!-- //.header inner -->
                    </div>
                    @if(!empty('header_slider_home_'.$home_variant_number.'_static_right_section_status'))
                    <div class="col-lg-5">
                        <div class="right-content bg-image" {!! render_background_image_markup_by_attachment_id(get_static_option('header_slider_home_'.$home_variant_number.'_static_right_section_image')) !!}>
                            <div class="price-wrap">
                                <p>{{get_static_option('header_slider_home_'.$home_variant_number.'_static_right_section_text')}}</p>
                                <span class="sign">{{get_static_option('header_slider_home_'.$home_variant_number.'_static_right_section_sign')}}</span>{{get_static_option('header_slider_home_'.$home_variant_number.'_static_right_section_price')}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
@if(get_static_option('home_page_header_bottom_section_status'))
    <div class="header-bottom-wrapper m-top padding-bottom-90">
        <div class="container">
            <div class="row">
                @foreach ($all_header_bottom_items as $data)
                <div class="col-lg-4 margin-bottom-30 ">
                    <div class="single-icon-box-03 bg-image style-0{{$loop->index}}" {!! render_background_image_markup_by_attachment_id($data->image) !!}>
                        <div class="content">
                            <a href="{{$data->url}}"><h4 class="title">{{$data->title}}</h4></a>
                            <h5 class="subtitle">{{$data->subtitle}}</h5>
                            <p class="offer">{{$data->offer_title}}</p>
                            <div class="price-wrap">
                                <span class="sign">{{$data->offer_price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@if(get_static_option('home_page_keyfeature_section_status'))
    @include('frontend.partials.keyfeature.keyfeature-variant-2')
@endif
@if(get_static_option('home_page_product_category_section_status'))
    @include('frontend.partials.product-category')
@endif
@if(get_static_option('home_page_special_offer_section_status'))
    @include('frontend.partials.offer.special-offer-variant-01')
@endif
@if(get_static_option('home_page_popular_products_section_status'))
    @include('frontend.partials.popular-products')
@endif
@if(get_static_option('home_page_testimonial_section_status'))
    @include('frontend.partials.testimonial.testimonial-variant-01')
@endif

@include('frontend.partials.ajax-product-home-functionality')