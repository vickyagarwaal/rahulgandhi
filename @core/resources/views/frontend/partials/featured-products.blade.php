<div class="our-product-area padding-top-50 padding-bottom-10">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title b-top desktop-center padding-top-25 margin-bottom-55">
                    <h3 class="title">{{get_static_option('home_page_featured_product_section_title')}}</h3>
                </div>
            </div>
        </div>
                <div class="row">
                   


                    @foreach ($all_featured_products as $data)
                    <div class="col-lg-3 col-md-6 col-sm-6 margin-bottom-30">
                        <x-frontend.product.single
                                :id="$data->id"
                                :badge="$data->badge"
                                :image="$data->image"
                                :title="$data->title"
                                :slug="$data->slug"
                                :subCategoryId="$data->sub_category_id"
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