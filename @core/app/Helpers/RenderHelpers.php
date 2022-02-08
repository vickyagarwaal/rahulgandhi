<?php


namespace App\Helpers;


class RenderHelpers
{

    public static function wishlistCountMarkup(){
        $output = '';
        if(get_static_option('navbar_wishlist_area')){
         $output = '<li class="wishlist-link"><a href="'.route('frontend.products.wishlist').'"><i class="far fa-heart"></i><span class="pcount">'.wishlist_total_items().'</span></a></li>';
        }
        return $output;
    }

    public static function cartCountMarkup(){
        $output = '';
        if(get_static_option('navbar_shopping_area')){
            $output = '<li class="cart"><a href="'.route('frontend.products.cart').'"><i class="flaticon-shopping-cart-2"></i><span class="pcount">'.cart_total_items().'</span></a></li>';
        }
        return $output;
    }
    public static function navbarSearchMarkup(){
        $output = '';
        if(get_static_option('navbar_search_area')){
            $output .= '<li>
                        <form class="search-form-small navbar-search" action="'.route('frontend.products').'" method="get">
                            <div class="form-group hide">
                                <input type="text" class="form-control" name="q" placeholder="..">
                            </div>
                            <button class="search-btn style-01 hide"><i class="flaticon-search-1"></i></button>
                        </form>
                    </li>';
        }
         return $output;
    }

}