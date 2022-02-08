@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Category:')}} {{$category_name}}
@endsection
@section('site-title')
    {{__('Category:')}} {{$category_name}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('product_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('product_page_meta_tags')}}">
@endsection
@section('content')
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                @foreach($all_products as $data)
                    <div class="col-lg-3 col-md-6">
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
            </div>
        </div>
    </section>
@endsection

@include('frontend.partials.ajax-form.ajax-addtocart')
