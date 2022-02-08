<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\ProductCoupon;
use App\Products;
use App\ProductShipping;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $product_details = Products::find($request->product_id);
        $qty = $request->quantity ?? 1;
        $new_cart_item = [
            'id' => $product_details->id,
            'title' => $product_details->title,
            'quantity' => $qty,
            'type' => !empty($product_details->is_downloadable) ? 'digital' : 'physical',
            'price' => $product_details->sale_price * $qty
        ];
        self::add_new_item_to_cart($new_cart_item);
        return redirect()->back()->with(['msg' => __('Product added to cart ') . '<a class="btn-small cart-view" href="' . route('frontend.products.cart') . '">' . __('View Cart') . '</a>', 'type' => 'success']);
    }

    public static function add_new_item_to_cart($new_item)
    {
        $old_cart_item = session()->get('cart_item');
        if (!empty($old_cart_item)) {
            if (array_key_exists($new_item['id'], $old_cart_item)) {
                //existing item of cart
                $existing_item = $old_cart_item[$new_item['id']];
                $old_cart_item[$new_item['id']]['quantity'] = $new_item['quantity'] + $existing_item['quantity'];
                $old_cart_item[$new_item['id']]['price'] = $existing_item['price'] + $new_item['price'];
            } else {
                $product_details = Products::find($new_item['id']);
                //add new item in existing cart
                $old_cart_item[$new_item['id']] = [
                    'id' => $new_item['id'],
                    'title' => $new_item['title'],
                    'quantity' => $new_item['quantity'],
                    'type' => !empty($product_details->is_downloadable) ? 'digital' : 'physical',
                    'price' => $new_item['price']
                ];
            }
            session()->put('cart_item', $old_cart_item);

        } else {
            $product_details = Products::find($new_item['id']);
            //new item in cart
            $cart_item[$new_item['id']] = [
                'id' => $new_item['id'],
                'title' => $new_item['title'],
                'quantity' => $new_item['quantity'],
                'type' => !empty($product_details->is_downloadable) ? 'digital' : 'physical',
                'price' => $new_item['price']
            ];
            session()->put('cart_item', $cart_item);
        }

    }


    public static function remove_cart_item(Request $request)
    {
        $old_cart_item = session()->get('cart_item');
        if (array_key_exists($request->product_id, $old_cart_item)) {
            unset($old_cart_item[$request->product_id]);
            session()->put('cart_item', $old_cart_item);
        }

        return response()->json(
            [
                'cart_table_markup' => render_cart_table(),
                'total_cart_item' => cart_total_items(),
                'cart_total_markup' => render_cart_total_table(),
                'shipping_charge_status' => is_shipping_available(),
            ]);
    }

    public function ajax_add_to_cart(Request $request)
    {

        $product_details = Products::find($request->product_id);
        $qty = $request->quantity ?? 1;
        $new_cart_item = [
            'id' => $product_details->id,
            'title' => $product_details->title,
            'quantity' =>  $qty,
            'type' => !empty($product_details->is_downloadable) ? 'digital' : 'physical',
            'price' => $product_details->sale_price *  $qty
        ];
        self::add_new_item_to_cart($new_cart_item);

        return response()->json(['msg' => __('Product Added In Cart'), 'total_cart_item' => cart_total_items()]);
    }

    public function ajax_cart_update(Request $request){
        $old_cart_item = [];
        $product_quantity = $request->quantity;
        foreach ($request->product_id as $key => $value){
            $product_details = Products::find($value);
            $old_cart_item[$value] = [
                'id' => $value,
                'title' => $product_details->title,
                'quantity' => $product_quantity[$key] ?? 1,
                'type' => !empty($product_details->is_downloadable) ? 'digital' : 'physical',
                'price' => $product_details->sale_price * $product_quantity[$key]
            ];
        }
        session()->put('cart_item', $old_cart_item);

        return  response()->json([
            'cart_table_markup' => render_cart_table(),
            'total_cart_item' => cart_total_items(),
            'cart_total_markup' => render_cart_total_table()
        ]);
    }

    public function ajax_coupon_code(Request $request){
        $this->validate($request,[
           'coupon_code' => 'required|string'
        ],
        [
            'coupon_code.required' => __('Enter your coupon code')
        ]);

        $coupon_details = ProductCoupon::where('code',$request->coupon_code)->first();
        if (!empty($coupon_details)){
            if (time() > strtotime($coupon_details->expire_date) ){
                return  response()->json([
                    'status' => 'failed',
                    'msg' => __('Coupon is expired'),
                ]);
            }
            session()->put('coupon_discount',$request->coupon_code);
            return  response()->json([
                'cart_total_markup' => render_cart_total_table(),
                'status' => 'ok',
                'msg' => __('Coupon Applied'),
            ]);
        }

        return  response()->json([
            'status' => 'failed',
            'msg' => __('Coupon Code Is Invalid'),
        ]);
    }

    public function ajax_shipping_apply(Request $request){
        $this->validate($request,[
            'shipping_id' => 'required|string'
            ],
            [
                'shipping_id.required' => __('Select Shipping Method')
            ]);

        $shipping_details = ProductShipping::find($request->shipping_id);
        if (!empty($shipping_details)){
            session()->put('shipping_charge',$shipping_details->id);
            return  response()->json([
                'cart_total_markup' => render_cart_total_table(),
                'status' => 'ok',
                'msg' => __('Shipping Added'),
            ]);
        }

        return  response()->json([
            'status' => 'failed',
            'msg' => __('Shipping Invalid'),
        ]);
    }

    //wishlist
    public function ajax_add_to_wishlist(Request $request)
    {

        $product_details = Products::find($request->product_id);
        $old_wishlist_item = session()->get('wishlist_item');
        if (is_array($old_wishlist_item) && array_key_exists($product_details->id, $old_wishlist_item)){
            $msg = __('This Item already in wishlist');
        }else{
            self::add_new_item_to_wishlist([
                'id' => $product_details->id,
                'title' => $product_details->title,
            ]);
            $msg = __('Product Added In Wishlist');
        }

        return response()->json(['msg' => $msg, 'total_wishlist_item' => wishlist_total_items()]);
    }

    public static function add_new_item_to_wishlist($new_item)
    {
        $old_wishlist_item = session()->get('wishlist_item');
        $old_wishlist_item[$new_item['id']] = [
            'id' => $new_item['id'],
            'title' => $new_item['title'],
        ];
        session()->put('wishlist_item', $old_wishlist_item);

    }
    public static function remove_wishlist_item(Request $request)
    {
        $old_wishlist_item = session()->get('wishlist_item');
        if (array_key_exists($request->product_id, $old_wishlist_item)) {
            unset($old_wishlist_item[$request->product_id]);
            session()->put('wishlist_item', $old_wishlist_item);
        }
        return response()->json(
            [
                'wishlist_table_markup' => render_wishlist_table(),
                'total_wishlist_item' => wishlist_total_items(),
            ]);
    }
}
