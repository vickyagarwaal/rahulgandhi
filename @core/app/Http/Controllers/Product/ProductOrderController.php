<?php
namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use KingFlamez\Rave\Facades\Rave;
use Unicodeveloper\Paystack\Facades\Paystack;

class ProductOrderController extends Controller
{
    public function product_checkout(Request $request){
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
            'different_shipping_address' => 'nullable|string',
            'shipping_name' => 'nullable|string',
            'shipping_email' => 'nullable|string',
            'shipping_phone' => 'nullable|string',
            'shipping_country' => 'nullable|string',
            'shipping_street_address' => 'nullable|string',
            'shipping_town' => 'nullable|string',
            'shipping_district' => 'nullable|string'
        ],
        [
            'billing_name.required' => __('The billing name field is required.'),
            'billing_email.required' => __('The billing email field is required.'),
            'billing_phone.required' => __('The billing phone field is required.'),
            'billing_country.required' => __('The billing country field is required.'),
            'billing_street_address.required' => __('The billing street address field is required.'),
            'billing_town.required' => __('The billing town field is required.'),
            'billing_district.required' => __('The billing district field is required.')
        ]);
        $order_details = ProductOrder::find($request->order_id);
        if (empty($order_details)){
            $order_details = ProductOrder::create([
                'payment_gateway' => $request->selected_payment_gateway,
                'payment_status' => 'pending',
                'payment_track' => Str::random(10). Str::random(10),
                'user_id' => auth()->check() ? auth()->user()->id : null,
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
                'order_created_by' =>  $request->order_created_by,
            ]);
        }
        if (empty(get_static_option('site_payment_gateway'))){
            rest_cart_session();
            return redirect()->route('frontend.product.payment.success',Str::random(6).$order_details->id.Str::random(6));
        }
        //have to work on below code
        if ($request->selected_payment_gateway === 'cash_on_delivery'){
            $this->send_order_mail($order_details->id);
            rest_cart_session();
            return redirect()->route('frontend.product.payment.success',Str::random(6).$order_details->id.Str::random(6));
        }elseif ($request->selected_payment_gateway === 'paypal'){

            /**
             * @required param list
             * $args['amount']
             * $args['description']
             * $args['item_name']
             * $args['ipn_url']
             * $args['cancel_url']
             * $args['payment_track']
             * return redirect url for paypal
             * */
            $redirect_url =  paypal_gateway()->charge_customer([
                'amount' => $order_details->total,
                'description' =>'Payment For Product Order Id: #'.$order_details->id.' Payer Name: '.$order_details->billing_name.' Payer Email:'.$order_details->billing_email,
                'item_name' => 'Payment For Product Order Id: #'.$order_details->id,
                'ipn_url' => route('frontend.product.paypal.ipn'),
                'cancel_url' => route('frontend.product.payment.cancel',$order_details->id),
                'payment_track' => $order_details->payment_track,
            ]);
            session()->put('product_id',$order_details->id);
            return redirect()->away($redirect_url);

        }elseif ($request->selected_payment_gateway === 'paytm'){


            /**
             *
             * charge_customer()
             * @required params
             * int order_id
             * string name
             * string email
             * int/float amount
             * string/url callback_url
             * */
            $redirect_url =  paytm_gateway()->charge_customer([
                'order_id' => $order_details->payment_track,
                'email' => $order_details->billing_email,
                'name' => $order_details->billing_name,
                'amount' =>  $order_details->total,
                'callback_url' => route('frontend.product.paytm.ipn')
            ]);
            return $redirect_url;

        }elseif ($request->selected_payment_gateway === 'manual_payment'){
           
             $this->validate($request,[
               'transaction_id_val' => 'required'
            ],[
                'transaction_id_val.required' => __('Transaction ID is required')
            ]);

            $order_details->transaction_id = $request->transaction_id_val;
            $order_details->save();

            $this->send_order_mail($order_details->id);
            rest_cart_session();
            return redirect()->route('frontend.product.payment.success',Str::random(6).$order_details->id.Str::random(6));

        }elseif ($request->selected_payment_gateway === 'stripe'){

            $stripe_data['order_id'] = $order_details->id;
            $stripe_data['route'] = route('frontend.product.stripe.ipn');
            return view('payment.stripe')->with('stripe_data' ,$stripe_data);
        }
        elseif ($request->selected_payment_gateway === 'razorpay'){

            /**
             *
             * @param array $args
             * @paral list
             * price
             * title
             * description
             * route
             * order_id
             *
             * @return @view with param
             */
            $redirect_url = razorpay_gateway()->charge_customer([
                'price' => $order_details->total,
                'title' => __('Payment For Product Order').' #'.$order_details,
                'description' => 'Payment For Product Order Id: #'.$order_details->id.' Payer Name: '.$order_details->billing_name.' Payer Email:'.$order_details->billing_email,
                'route' => route('frontend.product.razorpay.ipn'),
                'order_id' => $order_details->id
            ]);
            return $redirect_url;
        }
        elseif ($request->selected_payment_gateway === 'paystack'){

            /**
             * @required param list
             * 'amount'
             * 'package_name'
             * 'name'
             * 'email'
             * 'order_id'
             * 'track'
             * */
            $view_file = paystack_gateway()->charge_customer([
                'amount' => $order_details->total,
                'package_name' => __('Payment For Product Order #').$order_details->id,
                'name' => $order_details->billing_name,
                'email' => $order_details->billing_email,
                'order_id' => $order_details->id,
                'track' => $order_details->payment_track,
                'type' => 'product',
                'route' => route('frontend.product.paystack.pay'),
            ]);

            return $view_file;

        }elseif ($request->selected_payment_gateway === 'mollie'){

            /**
             * @required param list
             * amount
             * description
             * redirect_url
             * order_id
             * track
             * */
            $return_url =  mollie_gateway()->charge_customer([
                'amount' => $order_details->total,
                'description' =>'Payment For Product Order Id: #'.$order_details->id.' Payer Name: '.$order_details->billing_name.' Payer Email:'.$order_details->billing_email,
                'web_hook' => route('frontend.product.mollie.webhook'),
                'order_id' => $order_details->id,
                'track' => $order_details->payment_track,
            ]);
            return $return_url;

        }elseif ($request->selected_payment_gateway === 'flutterwave'){

            /**
             * @required params
             * name
             * email
             * ipn_route
             * amount
             * description
             * order_id
             * track
             *
             * */
            $view_file =  flutterwaverave_gateway()->charge_customer([
                'name' => $order_details->billing_name,
                'email' => $order_details->billing_email,
                'order_id' => $order_details->id,
                'amount' => $order_details->total,
                'track' => $order_details->payment_track,
                'description' =>  'Payment For Product Order Id: #'.$order_details->id.' Payer Name: '.$order_details->billing_name.' Payer Email:'.$order_details->billing_email,
                'callback' => route('frontend.product.flutterwave.callback'),
            ]);
            return $view_file;

        }

        return redirect()->route('homepage');
    }

    public function flutterwave_callback(Request $request)
    {

        /**
         *
         * @param array $args
         * @required param list
         * request
         *
         * @return array
         */
        $payment_data = flutterwaverave_gateway()->ipn_response([
            'request' => $request
        ]);

        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $gig_order = ProductOrder::where( 'payment_track', $payment_data['track'] )->first();
            $this->update_database($gig_order->id, $payment_data['transaction_id']);
            $this->send_order_mail($gig_order->id);
            $order_id = Str::random(6) . $gig_order->id . Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        abort(404);
    }

    public function mollie_webhook(){

        /**
         *
         * @param array $args
         * require param list
         * request
         * @return array|string[]
         *
         */
        $payment_data = mollie_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $gig_details = ProductOrder::find($payment_data['order_id']);
            $this->update_database($gig_details->id, $payment_data['transaction_id']);
            $this->send_order_mail($gig_details->id);
            $order_id = Str::random(6) . $gig_details->id. Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        abort(404);
    }


    public function paypal_ipn(Request $request)
    {

        $product_id = session()->get('product_id');
        session()->forget('product_id');
        /**
         * @required param list
         * $args['request']
         * $args['cancel_url']
         * $args['success_url']
         *
         * return @void
         * */
        $payment_data = paypal_gateway()->ipn_response([
            'request' => $request,
            'cancel_url' => route('frontend.product.payment.cancel',$product_id),
            'success_url' => route('frontend.product.payment.success',$product_id)
        ]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($product_id, $payment_data['transaction_id']);
            $this->send_order_mail($product_id);
            $order_id = Str::random(6) . $product_id . Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        return redirect()->route('frontend.product.payment.cancel',$product_id);
    }

    public function paytm_ipn(Request $request){
        $order_id = $request['ORDERID'];
        $payment_logs = ProductOrder::where( 'payment_track', $order_id )->first();
        /**
         *
         * ipn_response()
         *
         * @return array
         * @param
         * transaction_id
         * status
         * */
        $payment_data = paytm_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($payment_logs->id, $payment_data['transaction_id']);
            $this->send_order_mail($payment_logs->id);
            $order_id = Str::random(6) . $payment_logs->id . Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        return redirect()->route('frontend.product.payment.cancel',$payment_logs->id);

    }

    public function stripe_charge(Request $request){
        $order_details = ProductOrder::findOrFail($request->order_id);

        /**
         * @require params
         *
         * product_name
         * amount
         * description
         * ipn_url
         * cancel_url
         * order_id
         *
         * */

        $stripe_session =  stripe_gateway()->charge_customer([
            'product_name' => 'Payment For Product Order #'.$order_details->id,
            'amount' => $order_details->total,
            'description' => 'Payment From '. get_static_option('site_'.get_default_language().'_title').'. Product Order ID #'.$order_details->id .', Payer Name: '.$order_details->billing_name.', Payer Email: '.$order_details->billing_email,
            'ipn_url' => route('frontend.product.stripe.success'),
            'order_id' => $request->order_id,
            'cancel_url' => route('frontend.product.payment.cancel',$request->order_id)
        ]);
        return response()->json(['id' => $stripe_session['id']]);
    }
    public function stripe_success(Request $request)
    {
        /**
         * @require params
         * */
        $product_order_id = session()->get('stripe_order_id');
        session()->forget('stripe_order_id');
        $payment_data = stripe_gateway()->ipn_response();
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($product_order_id, $payment_data['transaction_id']);
            $this->send_order_mail($product_order_id);
            $order_id = Str::random(6) . $product_order_id . Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        return redirect()->route('frontend.product.payment.cancel',$product_order_id);
    }


    public function razorpay_ipn(Request $request){
        $order_details = ProductOrder::findOrFail($request->order_id);
        /**
         *
         * @param array $args
         * require param list
         * request
         * @return array|string[]
         *
         */
        $payment_data = razorpay_gateway()->ipn_response(['request' => $request]);
        if (isset($payment_data['status']) && $payment_data['status'] === 'complete'){
            $this->update_database($order_details->id, $payment_data['transaction_id']);
            $this->send_order_mail($order_details->id);
            $order_id = Str::random(6) . $order_details->id. Str::random(6);
            return redirect()->route('frontend.product.payment.success',$order_id);
        }
        return redirect()->route('frontend.product.payment.cancel',$order_details->id);
    }


    public function paystack_pay(){
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function update_database($product_id,$transaction_id){
        ProductOrder::where( 'id', $product_id )->update([
            'payment_status' => 'complete',
            'transaction_id' => $transaction_id
        ]);
        rest_cart_session();
    }
    public function send_order_mail($product_id){
        $order_details = ProductOrder::findOrFail($product_id);
        try {
            Mail::to(get_static_option('site_global_email'))->send(new \App\Mail\ProductOrder($order_details,'owner',__('You Have A New Product Order From ').get_static_option('site_'.get_default_language().'_title')));
            Mail::to($order_details->billing_email)->send(new \App\Mail\ProductOrder($order_details,'customer',__('You order has been placed in ').get_static_option('site_'.get_default_language().'_title')));
        }catch (\Exception $e){

        }
    }

}
