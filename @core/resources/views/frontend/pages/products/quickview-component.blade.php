@php
        $post_img = null;
        $blog_image = get_attachment_image_by_id($product->image,"full",false);
        $post_img = !empty($blog_image) ? $blog_image['img_url'] : '';
    @endphp
<div class="single-product-details">
    <div class="top-content">
        
            <div class="thumb">
                {!! render_image_markup_by_attachment_id($product->image,'','grid') !!}
            </div>
       
        <div class="product-summery">
            @if(count($product->ratings) > 0)
                <div class="rating-wrap">
                    <div class="ratings">
                        <span class="hide-rating"></span>
                        <span class="show-rating"
                              style="width: {{$average_ratings / 5 * 100}}%"></span>
                    </div>
                    <p><span class="total-ratings">({{count($product->ratings)}})</span></p>
                </div>
            @endif
            <div class="price-wrap">
                <span class="price">{{amount_with_currency_symbol($product->sale_price)}}</span>
                @if(!empty($product->regular_price))
                    <del
                        class="del-price">{{amount_with_currency_symbol($product->regular_price)}}</del>@endif
            </div>
            <h4 class="title"><a href="{{route('frontend.products.single',['slug'=>$product->slug,'id'=>$product->id])}}"> {{purify_html($product->title)}}</a></h4>
            <div class="short-description">
                <p>{{purify_html($product->short_description)}}</p>
            </div>
            <div class="single-add-to-card-wrapper">
                @if($product->stock_status == 'out_stock')
                    <div class="out_of_stock">{{__('Out Of Stock')}}</div>
                @else
                    <form action="{{route('frontend.products.add.to.cart')}}" method="post">
                        @csrf
                        <input type="number" class="quantity" name="quantity" min="1" value="1">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quickview" value="quickview">
                        <button type="submit"
                                class="addtocart" id="add-cart">{{get_static_option('product_single_add_to_cart_text')}}</button>
                    </form>
                @endif
            </div>
            <div class="cat-sku-content-wrapper">
                <div class="category-wrap">
                    <span class="title">{{get_static_option('product_single_category_text')}}</span>
                    {!! purify_html(get_product_category_by_id($product->category_id,'link')) !!}
                </div>
                @if(!empty($product->sub_category_id))
                <div class="category-wrap">
                    <span class="title">{{get_static_option('product_single_subcategory_text')}}</span>
                    {!! purify_html(get_product_category_by_id($product->sub_category_id,'link')) !!}
                </div>
                @endif
                @if(!empty($product->sku))
                    <div class="sku-wrap"><span
                            class="title">{{get_static_option('product_single_sku_text')}}</span>
                        <span class="sku_">{{$product->sku}}</span></div>
                @endif
            </div>
        </div>
    </div>
</div>