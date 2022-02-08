<?php

namespace App\Http\Controllers;

use App\AppointmentBooking;
use App\Mail\BasicMail;
use App\Order;
use App\PaymentLogs;
use App\Prescription;
use App\ProductOrder;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class UserDashboardController extends Controller
{
    const BASE_PATH = 'frontend.user.dashboard.';
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function user_index(){
        $user_details = User::find(Auth::guard('web')->user()->id);
        $product_orders = ProductOrder::where('user_id',$this->logged_user_details()->id)->count();
        $appointments = AppointmentBooking::where('user_id',$this->logged_user_details()->id)->count();
        return view('frontend.user.dashboard.user-home')->with(
            [
                'product_orders' => $product_orders,
                'appointments' => $appointments,
                'user_details' => $user_details,
            ]);
    }
    public function user_email_verify_index(){
        $user_details = Auth::guard('web')->user();
        if ($user_details->email_verified == 1){
            return redirect()->route('user.home');
        }
        if (empty($user_details->email_verify_token)){
            User::find($user_details->id)->update(['email_verify_token' => Str::random(20)]);
            $user_details = User::find($user_details->id);

            $message_body = __('Here is your verification code').' <span class="verify-code">'.$user_details->email_verify_token.'</span>';
            try {

                Mail::to($user_details->email)->send(new BasicMail([
                    'subject' => __('Verify your email address'),
                    'message' => $message_body
                ]));
            }catch (\Exception $e){

            }
        }
        return view('frontend.user.email-verify');
    }
    public function reset_user_email_verify_code(){
        $user_details = Auth::guard('web')->user();
        if ($user_details->email_verified == 1){
            return redirect()->route('user.home');
        }
        $message_body = __('Here is your verification code').' <span class="verify-code">'.$user_details->email_verify_token.'</span>';
        try {
            Mail::to($user_details->email)->send(new BasicMail([
                'subject' => __('Verify your email address'),
                'message' => $message_body
            ]));
        }catch (\Exception $e){
            return redirect()->route('user.email.verify')->with(['msg' => $e->getMessage(),'type' => 'danger']);
        }
        return redirect()->route('user.email.verify')->with(['msg' => __('Resend Verify Email Success'),'type' => 'success']);
    }
    public function user_email_verify(Request $request){
        $this->validate($request,[
            'verification_code' => 'required'
        ],[
            'verification_code.required' => __('verify code is required')
        ]);
        $user_details = Auth::guard('web')->user();
        $user_info = User::where(['id' =>$user_details->id,'email_verify_token' => $request->verification_code])->first();
        if (empty($user_info)){
            return redirect()->back()->with(['msg' => __('your verification code is wrong, try again'),'type' => 'danger']);
        }
        $user_info->email_verified = 1;
        $user_info->save();
        return redirect()->route('user.home');
    }
    public function user_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:191',
            'state' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'zipcode' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'address' => 'nullable|string',
        ],[
            'name.' => __('name is required'),
            'email.required' => __('email is required'),
            'email.email' => __('provide valid email'),
        ]);
        User::find(Auth::guard()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'address' => $request->address,
            ]
        );
        return redirect()->back()->with(['msg' => __('Profile Update Success'), 'type' => 'success']);
    }
    public function user_password_change(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ],
        [
            'old_password.required' => __('Old password is required'),
            'password.required' => __('Password is required'),
            'password.confirmed' => __('password must have be confirmed')
        ]
        );
        $user = User::findOrFail(Auth::guard()->user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::guard('web')->logout();
            return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function product_order_cancel(Request $request)
    {
        $order_details = ProductOrder::where(['id' => $request->order_id,'user_id' => Auth::guard('web')->user()->id])->first();
        ProductOrder::where('id',$order_details->id)->update([
            'status' => 'cancel'
        ]);

        //send mail to admin
        $data['subject'] = __('one of your product order has been cancelled');
        $data['message'] = __('hello').'<br>';
        $data['message'] .= __('your product order ').' #'.$order_details->id.' ';
        $data['message'] .= __('has been cancelled by the user.');
        try {
            Mail::to(get_static_option('site_global_email'))->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        //send mail to customer
        $data['subject'] = __('your order status has been cancel');
        $data['message'] = __('hello').$order_details->billing_name. '<br>';
        $data['message'] .= __('your order').' #'.$order_details->id.' ';
        $data['message'] .= __('status has been changed to cancel.');
        try {
            //send mail while order status change
            Mail::to($order_details->billing_email)->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => __('Order Cancel'), 'type' => 'warning']);
    }

    public function product_order_view($id){

        $order_details = ProductOrder::find($id);
        if (empty($order_details)) {
            return redirect_404_page();
        }
        return view('frontend.user.dashboard.product-order-view')->with(['order_details' => $order_details]);
    }

    public function product_orders()
    {
        $product_orders = ProductOrder::where('user_id',$this->logged_user_details()->id)->orderBy('id','DESC')->paginate(10);
        return view(self::BASE_PATH.'product-order')->with(['product_orders' => $product_orders]);
    }
    public function appointment_order_cancel(Request $request){
        $order_details = AppointmentBooking::where(['id' => $request->order_id,'user_id' => $this->logged_user_details()->id])->first();
        AppointmentBooking::where('id',$order_details->id)->update([
            'status' => 'cancel'
        ]);

        $admin_email = get_static_option('appointment_notify_mail') ?? get_static_option('site_global_email');
        //send mail to admin
        $data['subject'] = __('one of your booking has been cancelled');
        $data['message'] = __('hello').'<br>';
        $data['message'] .= __('your booking id').' #'.$order_details->id.' ';
        $data['message'] .= __('has been cancelled by the user.');
        try {
            Mail::to($admin_email)->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        //send mail to customer
        $data['subject'] = __('your booking has benn cancelled');
        $data['message'] = __('hello').' '.$order_details->name. '<br>';
        $data['message'] .= __('your booking id').' #'.$order_details->id.' ';
        $data['message'] .= __('status has been changed to cancel.');
        try {
            //send mail while order status change
            Mail::to($order_details->email)->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => __('booking Cancel'), 'type' => 'warning']);
    }
    public function logged_user_details(){
        $old_details = '';
        if (empty($old_details)){
            $old_details = User::findOrFail(Auth::guard('web')->user()->id);
        }
        return $old_details;
    }
    public function edit_profile()
    {
        return view(self::BASE_PATH.'edit-profile')->with(['user_details' => $this->logged_user_details()]);
    }

    /**
     * @since 2.0.4
     * */
    public function change_password()
    {
        return view(self::BASE_PATH.'change-password');
    }

    /**
     * @since 2.0.4
     * */
    public function appointment_booking()
    {
        $appointments =  AppointmentBooking::where('user_id',$this->logged_user_details()->id)->orderBy('id','DESC')->paginate(10);
        return view(self::BASE_PATH.'appointment-order')->with(['appointments' => $appointments]);
    }
    public function product_order_track()
    {
        return view(self::BASE_PATH.'product-order-track');
    }
    public function product_order_track_query(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|string',
        ],[
            'order_id.required' => __('Please enter your Product Order ID'),]
        );
        $order_details = ProductOrder::find($request->order_id);
        if(empty($order_details)){
            return redirect()->back()->with(['msg' => __('Order ID not found!'), 'type' => 'danger']);
        }
        if($order_details->user_id != Auth::guard('web')->user()->id){
            return redirect()->back()->with(['msg' => __('Invalid Order ID!'), 'type' => 'danger']);
        }
        return view(self::BASE_PATH.'product-order-track')->with(['order_details'=>$order_details]);
    }
    
    public function appointment_prescription ()
    {
        $all_prescription = Prescription::where('user_id',Auth::guard('web')->user()->id)->orderBy('id','DESC')->paginate(5);   
        return view(self::BASE_PATH.'appointment-prescription')->with(['all_prescription'=>$all_prescription]);
    }
    public function appointment_prescription_store (Request $request)
    {
        $this->validate($request,[
            'customer_message' => 'nullable|string',
            'customer_prescription' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10000',
        ]);
        $prescription = new Prescription();
        if($request->file('customer_prescription')){
            $extention = strtolower($request->file('customer_prescription')->getClientOriginalExtension());
            $image_full_name = 'user_prescription_'.date('dmy_H_s_i').'.'.$extention;
            $upload_path = 'assets/uploads/prescription/';
            $image_url = $upload_path . $image_full_name;
            $request->file('customer_prescription')->move($upload_path, $image_full_name);
            $prescription->customer_prescription = $image_url;
        }
        $user = User::find($request->user_id);
        $prescription->user_id = $request->user_id;
        $prescription->customer_message = Purifier::clean(strip_tags($request->customer_message));
        $prescription->status = 'pending';
        $prescription->name = $user->name;
        $prescription->email = $user->email;
        $prescription->save();
        //send to customer
        $data['subject'] = __('Prescription Request');
        $data['message'] = __('Hello,').$user->name.'<br>';
        $data['message'] .= __('Your prescription request has been submitted successfully.We will get back to you soon!');
        try {
            Mail::to($user->email)->send(new BasicMail($data));
        }catch (\Exception $e){

        }
        //send to admin
        $data['subject'] = __('You have a Prescription Request');
        $data['message'] = __('Hello,').'<br>';
        $data['message'] .= __('You have a prescription request from :'.$user->name.' ('.$user->email.')');
        try {
            Mail::to(get_static_option('appointment_notify_mail'))->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => get_static_option('prescription_form_submission_msg'), 'type' => 'success']);
        
    }

}
