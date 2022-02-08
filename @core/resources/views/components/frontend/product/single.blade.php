<div class="product-single-item">
    <div class="product-header">
        <div class="img-icon">
            {!! render_image_markup_by_attachment_id($image,'','grid') !!}
            @if(!empty($badge))
            <span class="badge">{{$badge}}</span>
            @endif
            <div class="social-link">
                <ul>
                    <li>
                        <a href="#" class="wishlist" id="wishlist" data-product_id="{{$id}}" data-product_title="{{$title}}"><i class="far fa-heart"></i></a>
                    </li>
                    <x-quickview.li :id="$id"/>
                </ul>
            </div>
        </div>
    </div>
    <div class="pcontent">
        <h4 class="title"><a href="{{route('frontend.products.single',['slug'=>$slug,'id'=>$id])}}">{{$title}}</a></h4>
        <p class="info-text">({{$subCategoryId ? get_product_category_name_by_id($subCategoryId) : optional($category)->name }})</p>
    </div>
    <div class="product-wrap ">
        <span class="sign">{{amount_with_currency_symbol($salePrice)}}</span>
        @if(!empty($regularPrice))<del class="del-price">{{amount_with_currency_symbol($regularPrice)}}</del>@endif
    </div>
    <div class="product-footer padding-bottom-30">
        <div class="btn-wrapper">
            <a href="{{route('frontend.products.add.to.cart')}}" class="boxed-btn ajax_add_to_cart" data-product_id="{{$id}}" data-product_title="{{$title}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i> {{get_static_option('product_add_to_cart_button_text')}}</a>
        </div>
    </div>
</div>