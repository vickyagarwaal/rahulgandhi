<?php

namespace App\Http\Controllers\Product;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;

use App\Mail\BasicMail;
use App\ProductCategory;
use App\ProductOrder;
use App\ProductRatings;
use App\Products;
use App\ProductShipping;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View as FacadesView;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function all_product()
    {
        $all_products = Products::all();
        return view('backend.products.all-products')->with(['all_products' => $all_products]);
    }
    public function new_product()
    {
        $all_category = ProductCategory::where('status','publish')->get();
        return view('backend.products.new-product')->with(['all_categories' => $all_category]);
    }
    public function store_product(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'regular_price' => 'nullable|max:191',
            'sale_price' => 'nullable|max:191',
            'sku' => 'nullable|max:191',
            'stock_status' => 'nullable|max:191',
            'is_downloadable' => 'nullable|max:191',
            'is_featured' => 'nullable|max:191',
            'image' => 'nullable|max:191',
            'gallery' => 'nullable|max:191',
            'tax_percentage' => 'nullable|max:191',
            'status' => 'nullable|max:191',
            'downloadable_file' => 'nullable|mimes:zip|max:10650',
            'attributes_title' => 'nullable',
            'attributes_description' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'meta_tags' => 'nullable|max:191',
            'meta_description' => 'nullable|max:191',
            'badge' => 'nullable|max:191',
            'title' => 'required|string',
        ]);
        $product_id = Products::create([
                "category_id" => $request->category_id,
                "sub_category_id" => $request->sub_category_id,
                "regular_price" => $request->regular_price,
                "sale_price" => $request->sale_price ?? 0,
                "sku" => Str::slug($request->sku),
                "stock_status" => $request->stock_status,
                "is_downloadable" => $request->is_downloadable,
                "is_featured" => $request->is_featured,
                "image" => $request->image,
                "gallery" => $request->gallery,
                "tax_percentage" => $request->tax_percentage,
                "status" => $request->status,
                'title' => $request->title,
                'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
                'badge' => $request->badge,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'attributes_title' => serialize($request->attributes_title),
                'attributes_description' => serialize($request->attributes_description),
                'meta_description'=> $request->meta_description,
                'meta_title'=> $request->meta_title,
                'meta_tags'=> $request->meta_tags,
                'og_meta_description'=> $request->og_meta_description,
                'og_meta_title'=> $request->og_meta_title,
                'og_meta_image'=> $request->og_meta_image,
        ])->id;
        if ($request->hasFile('downloadable_file')){
            $file_extenstion = $request->downloadable_file->getClientOriginalExtension();
            if ($file_extenstion == 'zip'){
                $file_name_with_ext = $request->downloadable_file->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $file_name = strtolower(Str::slug($file_name));
                $file_db = $file_name . time() . '.' . $file_extenstion;
                $request->downloadable_file->move('assets/uploads/downloadable/', $file_db);
                Products::where('id',$product_id)->update(['downloadable_file' => $file_db]);
            }
        }
        return back()->with(FlashMsg::item_new());
    }
    public function edit_product($id)
    {
        $product = Products::find($id);
        $all_category = ProductCategory::where(['status'=>'publish','parent_id'=>'0'])->get();
        $all_sub_categories = ProductCategory::where(['status'=>'publish'])->where('parent_id','!=',0)->get();
        return view('backend.products.edit-product')->with(['all_categories' => $all_category,'product' => $product,'all_sub_categories'=>$all_sub_categories]);
    }
    public function update_product(Request $request)
    {
        $product_details = Products::find($request->product_id);
        $this->validate($request,[
            'category_id' => 'required',
            'regular_price' => 'nullable|max:191',
            'sale_price' => 'nullable|max:191',
            'sku' => 'nullable|max:191',
            'stock_status' => 'nullable|max:191',
            'is_downloadable' => 'nullable|max:191',
            'is_featured' => 'nullable|max:191',
            'image' => 'nullable|max:191',
            'gallery' => 'nullable|max:191',
            'tax_percentage' => 'nullable|max:191',
            'status' => 'nullable|max:191',
            'downloadable_file' => 'nullable|mimes:zip|max:10650',
            'attributes_title' => 'nullable',
            'attributes_description' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
            'meta_tags' => 'nullable|max:191',
            'meta_description' => 'nullable|max:191',
            'badge' => 'nullable|max:191',
            'title' => 'required|string',
        ]);
        $product_details->update([
            'category_id' => $request->category_id,
            'sub_category_id' => ($request->sub_category_id)?? null,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price ?? 0,
            'sku' => Str::slug($request->sku),
            'stock_status' => $request->stock_status,
            'is_downloadable' => $request->is_downloadable,
            'is_featured' => $request->is_featured,
            'image' => $request->image,
            'gallery' => $request->gallery,
            'tax_percentage' => $request->tax_percentage,
            'status' => $request->status,
            'title' => $request->title,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'badge' => $request->badge,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'attributes_title' => serialize($request->attributes_title),
            'attributes_description' => serialize($request->attributes_description),
            'meta_description'=> $request->meta_description,
            'meta_title'=> $request->meta_title,
            'meta_tags'=> $request->meta_tags,
            'og_meta_description'=> $request->og_meta_description,
            'og_meta_title'=> $request->og_meta_title,
            'og_meta_image'=> $request->og_meta_image,
        ]);
        if ($request->hasFile('downloadable_file')){
            $file_extenstion = $request->downloadable_file->getClientOriginalExtension();
            if ($file_extenstion == 'zip'){
                $file_name_with_ext = $request->downloadable_file->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $file_name = strtolower(Str::slug($file_name));
                $file_db = $file_name . time() . '.' . $file_extenstion;
                $request->downloadable_file->move('assets/uploads/downloadable/', $file_db);
                if (file_exists('assets/uploads/downloadable/'.$product_details->downloadable_file)){
                    @unlink('assets/uploads/downloadable/'.$product_details->downloadable_file);
                }
                $product_details ->update(['downloadable_file' => $file_db]);
            }
        }
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function clone_product(Request $request)
    {
        $products = Products::find($request->item_id);
        Products::create([
            'category_id' => $products->category_id,
            'sub_category_id' => ($products->sub_category_id)?? null,
            'regular_price' => $products->regular_price,
            'sale_price' => $products->sale_price ?? 0,
            'sku' => $products->sku,
            'stock_status' => $products->stock_status,
            'is_downloadable' => $products->is_downloadable,
            'is_featured' => $products->is_featured,
            'image' => $products->image,
            'gallery' => $products->gallery,
            'tax_percentage' => $products->tax_percentage,
            'title' => $products->title,
            'slug' => $products->slug ? Str::slug($products->slug) : Str::slug($products->title),
            'badge' => $products->badge,
            'description' => $products->description,
            'short_description' => $products->short_description,
            'attributes_title' => ($products->attributes_title),
            'attributes_description' => ($products->attributes_description),
            'meta_description'=> $products->meta_description,
            'meta_title'=> $products->meta_title,
            'meta_tags'=> $products->meta_tags,
            'og_meta_description'=> $products->og_meta_description,
            'og_meta_title'=> $products->og_meta_title,
            'og_meta_image'=> $products->og_meta_image,
            'status' => 'draft',
        ]);
        return back()->with(FlashMsg::item_clone());
    }
    public function delete_product($id){
        $product_details = Products::find($id);
        if (file_exists('assets/uploads/downloadable/'.$product_details->downloadable_file)){
            @unlink('assets/uploads/downloadable/'.$product_details->downloadable_file);
        }
        $product_details->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function download_file($id){
        $product_details = Products::find($id);
        if (file_exists('assets/uploads/downloadable/'.$product_details->downloadable_file)){
            $temp_file = asset('assets/uploads/downloadable/'.$product_details->downloadable_file);
            $file = new Filesystem();
            $file->copy($temp_file, 'assets/uploads/downloadable/'.Str::slug($product_details->title).'.zip');
            return response()->download('assets/uploads/downloadable/'.Str::slug($product_details->title).'.zip')->deleteFileAfterSend(true);
        }
        return redirect()->route('admin.home');
    }
    public function page_settings(){
        return view('backend.products.product-page-settings');
    }
    public function update_page_settings(Request $request){
        $this->validate($request,[
            'product_post_items' => 'nullable|string|max:191',
            'product_add_to_cart_button_text' => 'nullable|string|max:191',
            'product_category_text' => 'nullable|string|max:191',
            'product_rating_filter_text' => 'nullable|string|max:191',
            'product_price_filter_text' => 'nullable|string|max:191'
        ]);
        $fields =[
            'product_post_items',
            'product_add_to_cart_button_text',
            'product_category_text',
            'product_rating_filter_text',
            'product_price_filter_text'
        ];
        foreach ($fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function single_page_settings(){
        return view('backend.products.product-single-page-settings');
    }
    public function update_single_page_settings(Request $request){
        $this->validate($request,[
            'product_single_add_to_cart_text' => 'nullable|string|max:191',
            'product_single_category_text' => 'nullable|string|max:191',
            'product_single_subcategory_text' => 'nullable|string|max:191',
            'product_single_sku_text' => 'nullable|string|max:191',
            'product_single_description_text' => 'nullable|string|max:191',
            'product_single_attributes_text' => 'nullable|string|max:191',
            'product_single_related_product_text' => 'nullable|string|max:191',
            'product_single_ratings_text' => 'nullable|string|max:191',
            'product_single_related_products_status' => 'nullable|string|max:191',
            'product_single_products_review_status' => 'nullable|string|max:191',
        ]);
        $fields = [
            'product_single_add_to_cart_text' ,
            'product_single_category_text' ,
            'product_single_subcategory_text' ,
            'product_single_sku_text',
            'product_single_description_text',
            'product_single_attributes_text' ,
            'product_single_related_product_text',
            'product_single_ratings_text',
            'product_single_products_review_status',
            'product_single_related_products_status',
        ];
        foreach ($fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function cancel_page_settings(){
        return view('backend.products.product-cancel-page-settings');
    }
    public function update_cancel_page_settings(Request $request){
        $this->validate($request,[
            'product_cancel_page_title' => 'nullable|string|max:191',
            'product_cancel_page_description' => 'nullable|string|max:191',
        ]);
        $fields = [
            'product_cancel_page_title' ,
            'product_cancel_page_description' ,
        ];
        foreach ($fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function success_page_settings(){
        return view('backend.products.product-success-page-settings');
    }
    public function update_success_page_settings(Request $request){

        $this->validate($request,[
            'product_success_page_title' => 'nullable|string|max:191',
            'product_success_page_description' => 'nullable|string|max:191',
        ]);
        $fields = [
            'product_success_page_title' ,
            'product_success_page_description' ,
        ];
        foreach ($fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function product_order_logs(){
        $all_orders = ProductOrder::all();
        return view('backend.products.product-orders-all')->with(['all_orders' => $all_orders]);
    }
    public function product_order_payment_approve(Request $request,$id){
        $order_details = ProductOrder::find($id);
        $order_details->payment_status = 'complete';
        $order_details->save();

        $site_title = get_static_option('site_title');
        $customer_subject = __('You order has been placed in').' '.$site_title;
        $admin_subject = __('You Have A New Product Order From').' '.$site_title;

        try {
            Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\ProductOrder($order_details,'owner',$admin_subject));
            Mail::to($order_details->billing_email)->send(new \App\Mail\ProductOrder($order_details,'customer',$customer_subject));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => __('Payment Status Updated..'),'type' => 'success']);
    }
    public function product_order_delete(Request $request,$id){
        ProductOrder::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Order Log Deleted..'),'type' => 'danger']);
    }
    public function product_order_status_change(Request $request){
        $this->validate($request,[
            'order_status' => 'nullable|string|max:191'
        ]);
        $order_details = ProductOrder::find($request->order_id);
        $cart_items = unserialize($order_details->cart_items,['class' => false]);
        $product = '';
        foreach($cart_items as $item){
            $product = Products::find($item['id']);
            if(!empty($product)){
                $product->sales += $item['quantity'];
                $product->save();
            }
        }
        $order_details->status = $request->order_status;
        $order_details->save();

        $data['subject'] = __('your order status has been changed');
        $data['message'] = __('hello').' '.$order_details->billing_name .'<br>';
        $data['message'] .= __('your order').' #'.$order_details->id.' ';
        $data['message'] .= __('status has been changed to').' '.str_replace('_',' ',$request->order_status).'.';
        //send mail while order status change
        try {
            Mail::to($order_details->billing_email)->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => __('Product Order Status Update..'),'type' => 'success']);
    }
    public function generate_invoice(Request $request){
        $order_details = ProductOrder::find($request->order_id);
        $pdf = PDF::loadView('backend.products.pdf.order', ['order_details' => $order_details]);
        return $pdf->download('product-order-invoice.pdf');
    }
    public function product_ratings(){
        $all_ratings = ProductRatings::all();
        return view('backend.products.product-ratings-all')->with(['all_ratings' => $all_ratings]);
    }
    public function product_ratings_delete(Request $request, $id){
        ProductRatings::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Product Review Deleted..'),'type' => 'danger']);
    }
    public function bulk_action(Request $request){
        $all = Products::find($request->ids);
        foreach($all as $item){
            if (file_exists('assets/uploads/downloadable/'.$item->downloadable_file)){
                @unlink('assets/uploads/downloadable/'.$item->downloadable_file);
            }
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
    public function product_order_bulk_action(Request $request){
        $all = ProductOrder::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
    public function product_ratings_bulk_action(Request $request){
        $all = ProductRatings::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
    public function order_report(Request  $request)
    {
        $order_data = '';
        $query = ProductOrder::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->payment_status)){
            $query->where(['payment_status' => $request->payment_status ]);
        }
        if (!empty($request->order_status)){
            $query->where(['status' => $request->order_status ]);
        }
        $error_msg = __('select start & end date to generate event payment report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view('backend.products.product-order-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'payment_status' => $request->payment_status,
            'order_status' => $request->order_status,
            'error_msg' => $error_msg
        ]);
    }
    public function tax_settings(){
        return view('backend.products.product-tax-settings');
    }
    public function update_tax_settings(Request $request)
    {
        $this->validate($request,[
            'product_tax' => 'nullable|string',
            'product_tax_system' => 'nullable|string',
            'product_tax_type' => 'nullable|string',
            'product_tax_percentage' => 'nullable'
        ]);

        $all_fields = [
            'product_tax',
            'product_tax_system',
            'product_tax_type',
            'product_tax_percentage'
        ];

        foreach ($all_fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function order_reminder(Request $request)
    {
        //send order reminder mail
        $order_details = ProductOrder::find($request->id);
        $data['subject'] = __('your order is still in pending at').' '. get_static_option('site_title');
        $data['message'] = __('hello').' '.$order_details->billing_name .'<br>';
        $data['message'] .= __('your order ').' #'.$order_details->id.' ';
        $data['message'] .= __('is still in pending, to complete your booking go to');
        $data['message'] .= ' <a href="'.route('user.home').'">'.__('your dashboard').'</a>';

        try {
            //send mail while order status change
            Mail::to($order_details->billing_email)->send(new BasicMail($data));
        }catch (\Exception $e){
            //
        }

        return redirect()->back()->with(['msg' => __('Reminder Mail Send Success'),'type' => 'success']);
    }
    public function subcategory_info(Request $request)
    {
        $all_sub_category = ProductCategory::where('parent_id',$request->category_id)->get();
        return response()->json([
            'view'=>(String)FacadesView::make('backend.products.components.sub-category')->with([
                'all_sub_category'=> $all_sub_category,
            ])
        ]);
    }
    public function product_order_view($id)
    {
        $product = ProductOrder::findOrFail($id);
        return view('backend.products.product-order-view')->with(['product_order' => $product]);
    }
    public function order_track_settings(){
        return view('backend.products.product-track-page-settings');
    }
    public function update_order_track_settings(Request $request){
        $this->validate($request,[
            'product_track_order_confirmed_text' => 'nullable|string|max:191',
            'product_track_payment_complete_text' => 'nullable|string|max:191',
            'product_track_payment_pending_text' => 'nullable|string|max:191',
            'product_track_in_transit_text' => 'nullable|string|max:191',
            'product_track_shipped_text' => 'nullable|string|max:191',
            'product_track_delivered_text' => 'nullable|string|max:191',
            'product_track_order_complete_text' => 'nullable|string|max:191', 
            'product_track_order_canceled_text' => 'nullable|string|max:191', 
        ]);
        $fields = [
            'product_track_order_confirmed_text',
            'product_track_payment_complete_text',
            'product_track_payment_pending_text',
            'product_track_in_transit_text',
            'product_track_shipped_text',
            'product_track_delivered_text',
            'product_track_order_complete_text', 
            'product_track_order_canceled_text', 
        ];
        foreach ($fields as $field){
            update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function create_order()
    {
        $all_products = Products::where(['status'=>'publish','stock_status'=>'in_stock'])->get();
        $all_users = User::all();
        $all_shipping = ProductShipping::where(['status' => 'publish'])->orderBy('order', 'ASC')->get();
        return view('backend.products.create-order')->with(['all_products' => $all_products,'all_users'=>$all_users,'all_shipping'=>$all_shipping]);
    }
    public function bill_info(Request $request)
    {
        $user_details = User::find($request->id);
        return response()->json([
            'view'=>(String)FacadesView::make('backend.products.components.bill-info')->with([
                'user_details'=> $user_details,
            ])
        ]);
    }
    public function order_place(Request $request)
    {
        $this->validate($request,[
            'payment_gateway' => 'nullable|string',
            'subtotal' => 'required|string',
            'coupon_discount' => 'nullable|string',
            'shipping_cost' => 'nullable|string',
            'product_shippings_id' => 'nullable|string',
            'total' => 'required|string',
            'billing_name' => 'required|string',
            'billing_email' => 'required|string',
            'billing_phone' => 'required|string',
            'billing_country' => 'required|string',
            'billing_street_address' => 'required|string',
            'billing_town' => 'required|string',
            'billing_district' => 'required|string',
            'user_id' => 'required|string',
        ],
        [
            'billing_name.required' => __('The billing name field is required.'),
            'billing_email.required' => __('The billing email field is required.'),
            'billing_phone.required' => __('The billing phone field is required.'),
            'billing_country.required' => __('The billing country field is required.'),
            'billing_street_address.required' => __('The billing street address field is required.'),
            'billing_town.required' => __('The billing town field is required.'),
            'billing_district.required' => __('The billing district field is required.'),
            'user_id.required' => __('Select a Customer.')
        ]);
        $order_details = ProductOrder::create([
            'payment_gateway' => $request->selected_payment_gateway,
            'payment_status' => 'pending',
            'payment_track' => Str::random(10). Str::random(10),
            'user_id' => $request->user_id,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'coupon_code' => session()->get('coupon_discount'),
            'shipping_cost' => $request->shipping_cost,
            'product_shippings_id' => $request->product_shippings_id,
            'total' => $request->total,
            'billing_name'  => $request->billing_name,
            'billing_email'  => $request->billing_email,
            'billing_phone'  => $request->billing_phone,
            'billing_country' => $request->billing_country,
            'billing_street_address' => $request->billing_street_address,
            'billing_town' => $request->billing_town,
            'billing_district' => $request->billing_district,
            'different_shipping_address' => $request->different_shipping_address ? 'yes' : 'no',
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'shipping_country' => $request->shipping_country,
            'shipping_street_address' => $request->shipping_street_address,
            'shipping_town' => $request->shipping_town,
            'shipping_district' => $request->shipping_district,
            'cart_items' => !empty(session()->get('cart_item')) ? serialize(session()->get('cart_item')) : '',
            'status' =>  'pending',
            'order_created_by' => Auth::user()->id
        ]);
        $this->send_order_mail($order_details->id);
        rest_cart_session();
        return redirect()->back()->with(FlashMsg::settings_update('Order Place Successfully'));
        
    }
    public function send_order_mail($product_id)
    {
        $order_details = ProductOrder::findOrFail($product_id);
        try {
            Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\ProductOrder($order_details,'owner',__('You Have A New Product Order From ').get_static_option('site_title')));
            Mail::to($order_details->billing_email)->send(new \App\Mail\ProductOrder($order_details,'customer',__('You order has been placed in ').get_static_option('site_title')));
        }catch (\Exception $e){
            //
        }
    }
}
