<div class="our-product-area padding-top-120 padding-bottom-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                    <h3 class="title">{{get_static_option('home_page_product_category_section_title')}}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-gallery-masonry-wrapper">
                    <div class="col-md-12">
                        <ul class="product-gallery-menu">
                            <li class="active all" data-filter="">
                                <div class="icon">
                                    <i class="flaticon-medical-control"></i>
                                </div>
                                <h2 class="title">{{"All"}}</h2>
                            </li>
                            @foreach ($products_category as $data)
                            <li class="{{Str::slug($data->name)}}" data-filter=".{{Str::slug($data->name)}}">
                                <div class="icon">
                                    <i class="{{$data->icon}}"></i>
                                </div>
                                <h2 class="title">{{$data->name}}</h2>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-gallery-masonry">
                        @foreach($all_products as $data)
                        <div class="col-lg-3 col-md-6 col-sm-6 masonry-item {{Str::slug(($data->category->name))}}">
                            <x-frontend.product.single
                                    :id="$data->id"
                                    :badge="$data->badge"
                                    :image="$data->image"
                                    :title="$data->title"
                                    :slug="$data->slug"
                                    :subCategoryId="$data->sub_category_id"
                                    :regularPrice="$data->regular_price"
                                    :salePrice="$data->sale_price"
                                    :category="$data->category">
                            </x-frontend.product.single>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

