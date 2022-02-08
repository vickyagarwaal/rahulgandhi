@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('product_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('product_page_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('product_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('product_page_meta_tags')}}">
@endsection
@section('content')
    <section class="blog-content-area padding-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <x-msg.all />
                </div>
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-archive-top-content-area">
                                <div class="search-form">
                                    <input type="text" class="form-control" id="search_term" placeholder="{{__('Search..')}}" value="{{$search_term}}">
                                    <button type="button" id="product_search_btn"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="product-sorting">
                                    <select id="product_sorting_select">
                                        <option value="default" @if($selected_order == '' || $selected_order == 'default') selected @endif >{{__('Newest Product')}}</option>
                                        <option value="old" @if($selected_order == 'old') selected @endif >{{__('Oldest Product')}}</option>
                                        <option value="high_low" @if($selected_order == 'high_low') selected @endif >{{__('Highest To Lowest')}}</option>
                                        <option value="low_high" @if($selected_order == 'low_high') selected @endif >{{__('Lowest To Highest')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if(count($all_products) > 0)
                            @foreach($all_products as $data)
                            <div class="col-lg-4 col-md-6 col-sm-6 margin-bottom-40">
                                <x-frontend.product.single
                                        :id="$data->id"
                                        :badge="$data->badge"
                                        :image="$data->image"
                                        :title="$data->title"
                                        :slug="$data->slug"
                                        :subCategoryId="$data->sub_category_id"
                                        :salePrice="$data->sale_price"
                                        :regularPrice="$data->regular_price"
                                        :category="$data->category">
                                </x-frontend.product.single>
                            </div>
                            @endforeach
                        <div class="col-lg-12 text-center">
                            <nav class="pagination-wrapper " aria-label="Page navigation ">
                                {{$all_products->links()}}
                            </nav>
                        </div>
                        @else
                        <div class="col-lg-12 text-center">
                            <div class="alert alert-warning">{{__('No Products Found')}} </div>
                         </div>
                        @endif
                    </div>
                </div>
           
            </div>
        </div>
    </section>
    <form id="product_search_form" class="d-none"  action="{{route('frontend.products')}}" method="get">
        <input type="hidden" id="search_query" name="q" value="{{$search_term}}">
        <input type="hidden" id="min_price" name="min_price" value="{{$min_price}}">
        <input type="hidden" id="max_price" name="max_price" value="{{$max_price}}">
        <input type="hidden" name="cat_id" id="category_id" value="{{$selected_category}}">
        <input type="hidden" name="orderby" id="orderby" value="{{$selected_order ? $selected_order : 'default'}}">
        <input type="hidden" name="rating" id="review" value="{{$selected_rating}}">
        <button id="product_hidden_form_submit_button" type="submit"></button>
    </form>
    <x-quickview.modal/>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery-ui.css')}}">
@endsection
@section('scripts')
    <script src="{{asset('assets/frontend/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/common/js/toastr.min.js')}}"></script>
    <x-quickview.js/>
    <x-btn.add-cart/>
    <script>
        (function () {
            "use strict";
            //wishlist
            $(document).on('click','#wishlist',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "{{route('frontend.products.add.to.wishlist.ajax')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        'product_id' : allData.product_id,
                    },
                    beforeSend: function(){
                            el.addClass("disabled")
                            el.html('<i class="fas fa-spinner fa-spin text-white"></i>');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fas fa-heart text-white"></i>');
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        var itemsContainer = $('.navbar-area .nav-container .nav-right-content ul li.wishlist-link .pcount');
                        var total = itemsContainer.text();
                        if (total < data.total_wishlist_item) {
                            toastr.success(data.msg);
                        } else {
                            toastr.info(data.msg);
                        }
                        itemsContainer.text(data.total_wishlist_item);

                    }
                });
            });
            //quickview
            $(document).on('click','.quickview',function (e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                $.ajax({
                        type:'GET',
                        url:  '{{route("frontend.products.quickview")}}',
                        data: {product_id:product_id},
                        beforeSend: function(){
                            $("#AppendQuickView").html('<div class="loader-2"></div>');
                        },
                        success: function(resp){
                            $("#AppendQuickView").html(resp.view);
                        },error: function(){
                        }
                });
            });
            //search form trigger
            $(document).on('click','#product_search_btn',function (e) {
                e.preventDefault();
                var searchTerms = $('#search_term').val();
                $('#search_query').val(searchTerms)
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change','#product_sorting_select',function (e) {
                var sortVal = $('#product_sorting_select').val();
                $('#orderby').val(sortVal);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click','.product_category_list > li a',function (e) {
                e.preventDefault();
                var catID = $(this).data('catid');
                $('#category_id').val(catID);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change','input[name="ratings_val"]',function (e) {
                e.preventDefault();
                $('#review').val($(this).val());
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click','#submit_price_filter_btn',function (e) {
                e.preventDefault();
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: "{{$maximum_available_price}}",
                values: [ "{{$min_price}}", "{{$max_price}}" ],
                slide: function( event, ui ) {
                    var min_price = ui.values[ 0 ];
                    var max_price = ui.values[ 1 ];
                    var siteGlobalCurrency = "{{site_currency_symbol()}}";
                    $('.min_filter_price').text(siteGlobalCurrency+min_price);
                    $('.max_filter_price').text(siteGlobalCurrency+max_price);
                    $('#min_price').val(min_price);
                    $('#max_price').val(max_price);
                }
            });

            $(document).on('click','.ajax_add_to_cart',function (e) {
                e.preventDefault();
                var allData = $(this).data();
                var el = $(this);
                $.ajax({
                    url : "{{route('frontend.products.add.to.cart.ajax')}}",
                    type: "POST",
                    data: {
                        _token : "{{csrf_token()}}",
                        'product_id' : allData.product_id,
                        'quantity' : allData.product_quantity,
                    },
                    beforeSend: function(){
                        el.addClass("disabled")
                        el.html('<i class="fas fa-spinner fa-spin mr-1"></i>{{__("Adding")}}');
                    },
                    success: function (data) {
                        el.removeClass("disabled")
                        el.html('<i class="fa fa-shopping-bag mr-1" aria-hidden="true"></i>'+"{{get_static_option('product_add_to_cart_button_text')}}");
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "2000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success(data.msg);
                        $('.navbar-area .nav-container .nav-right-content ul li.cart .pcount,.mobile-cart a .pcount').text(data.total_cart_item);
                    }
                });
            });

        })(jQuery);
    </script>
@endsection


