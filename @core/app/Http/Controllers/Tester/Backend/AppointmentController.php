<?php

namespace App\Http\Controllers\Appointment\Backend;

use App\Http\Controllers\Controller;
use App\Appointment;
use App\AppointmentBooking;
use App\AppointmentBookingTime;
use App\AppointmentCategory;
use App\Helpers\FlashMsg;
use App\Mail\BasicMail;
use App\Prescription;
use App\ProductOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public $base_view_path = 'backend.appointment.';
    public function appointment_all()
    {
        $all_appointment = Appointment::get();
        return view($this->base_view_path . 'appointment-all')->with(['all_appointment' => $all_appointment]);
    }
    
    public function appointment_new()
    {
        $all_booking_time = AppointmentBookingTime::where('status' , 'publish')->get();
        $appointment_category = AppointmentCategory::where('status','publish')->get();
        return view($this->base_view_path . 'appointment-new')->with([
            'all_booking_time' => $all_booking_time,
            'appointment_category' => $appointment_category
        ]);
    }
    public function appointment_store(Request $request){
        $this->validate($request,[
            'max_appointment' => 'nullable|numeric',
            'appointment_status' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|string',
            'status' => 'required|string',
            'title' =>  'required|string',
            'slug' =>  'nullable|string',
            'designation' =>  'required|string',
            'short_description' =>  'nullable|string',
            'meta_title' =>  'nullable|string',
            'meta_tags' =>  'nullable|string',
            'meta_description' =>  'nullable|string',
        ],[
            'additional_info.check_array' => __('Enter Additional Info'),
            'experience_info.check_array' => __('Enter Experience Info'),
            'specialized_info.check_array' => __('Enter Specialized Info'),
            'booking_info.check_array' => __('Enter Booking Info'),
        ]);
        Appointment::create([
            'categories_id' => $request->categories_id,
            'status'=> $request->status,
            'appointment_status' => $request->appointment_status,
            'image' => $request->image,
            'max_appointment'=> $request->max_appointment,
            'price'=> $request->price,
            'location'=> $request->location,
            'title'=> $request->title,
            'designation'=> $request->designation,
            'short_description'=> $request->short_description,
            'description'=> $request->description,
            'additional_info'=> $request->additional_info,
            'experience_info'=> $request->experience_info,
            'specialized_info'=> $request->specialized_info,
            'booking_info' =>$request->booking_info,
            'meta_description'=> $request->meta_description,
            'meta_title'=> $request->meta_title,
            'meta_tags'=> $request->meta_tags,
            'og_meta_description'=> $request->og_meta_description,
            'og_meta_title'=> $request->og_meta_title,
            'og_meta_image'=> $request->og_meta_image,
            'slug'=> !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title)
        ]);
        return back()->with(FlashMsg::item_new());
    }
    public function appointment_edit($id){

        $edit_items = Appointment::find($id);
        $all_booking_time = AppointmentBookingTime::where('status','publish')->get();
        $appointment_category =AppointmentCategory::where('status','publish')->get();
        return view($this->base_view_path.'appointment-edit')->with([
            'edit_items' => $edit_items,
            'all_booking_time' => $all_booking_time,
            'appointment_category' => $appointment_category,
        ]);
    }
    public function appointment_update(Request $request){
        $this->validate($request,[
            'max_appointment' => 'nullable|numeric',
            'appointment_status' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|string',
            'status' => 'required|string',
            'title' =>  'required|string',
            'slug' =>  'nullable|string',
            'designation' =>  'required|string',
            'short_description' =>  'nullable|string',
            'meta_title' =>  'nullable|string',
            'meta_tags' =>  'nullable|string',
            'meta_description' =>  'nullable|string',
            'additional_info' =>  'check_array:1',
            'experience_info' =>  'check_array:1',
            'specialized_info' =>  'check_array:1',
            'booking_info' =>  'check_array:1'
        ],[
            'additional_info.check_array' => __('Enter Additional Info'),
            'experience_info.check_array' => __('Enter Experience Info'),
            'specialized_info.check_array' => __('Enter Specialized Info'),
            'booking_info.check_array' => __('Enter Booking Info'),
        ]);
        Appointment::find($request->id)->update([
            'categories_id' => $request->categories_id,
            'status'=> $request->status,
            'appointment_status' => $request->appointment_status,
            'image' => $request->image,
            'max_appointment'=> $request->max_appointment,
            'price'=> $request->price,
            'location'=> $request->location,
            'title'=> $request->title,
            'designation'=> $request->designation,
            'short_description'=> $request->short_description,
            'description'=> $request->description,
            'additional_info'=> $request->additional_info,
            'experience_info'=> $request->experience_info,
            'specialized_info'=> $request->specialized_info,
            'booking_info' =>$request->booking_info,
            'meta_description'=> $request->meta_description,
            'meta_title'=> $request->meta_title,
            'meta_tags'=> $request->meta_tags,
            'og_meta_description'=> $request->og_meta_description,
            'og_meta_title'=> $request->og_meta_title,
            'og_meta_image'=> $request->og_meta_image,
            'slug'=> !empty($request->slug) ? Str::slug($request->slug) : Str::slug($request->title)
        ]);
        
        return back()->with(FlashMsg::item_update());
    }
    public function appointment_delete($id){
        Appointment::where('id',$id)->delete();
        return back()->with(FlashMsg::item_delete());
    }
    public function appointment_clone(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $slug = $appointment->slug;
        $check_slug = Appointment::where('slug',$slug)->get();
            if (count($check_slug) > 0){
                $slug .= '-'.date('s');
        }
        Appointment::create([
            'categories_id' => $appointment->categories_id,
            'status'=> 'draft',
            'appointment_status' => $appointment->appointment_status,
            'image' => $appointment->image,
            'max_appointment'=> $appointment->max_appointment,
            'price'=> $appointment->price,
            'location'=> $appointment->location,
            'title'=> $appointment->title,
            'designation'=> $appointment->designation,
            'short_description'=> $appointment->short_description,
            'description'=> $appointment->description,
            'additional_info'=> $appointment->additional_info,
            'experience_info'=> $appointment->experience_info,
            'specialized_info'=> $appointment->specialized_info,
            'booking_info' =>$appointment->booking_info,
            'meta_description'=> $appointment->meta_description,
            'meta_title'=> $appointment->meta_title,
            'meta_tags'=> $appointment->meta_tags,
            'og_meta_description'=> $appointment->og_meta_description,
            'og_meta_title'=> $appointment->og_meta_title,
            'og_meta_image'=> $appointment->og_meta_image,
            'slug'=> $slug
        ]);
        return back()->with(FlashMsg::item_clone());
    }
    public function bulk_action(Request $request){
        Appointment::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function form_builder(){
        return view($this->base_view_path.'appointment-booking-form');
    }
    public function form_builder_save(Request $request){
        $this->validate($request,[
            'field_name' => 'required|max:191',
            'field_placeholder' => 'required|max:191',
        ]);
        unset($request['_token']);
        $all_fields_name = [];
        $all_request_except_token = $request->all();
        foreach ($request->field_name as $fname){
            $all_fields_name[] = strtolower(Str::slug(htmlspecialchars(strip_tags($fname))));
        }
        $all_request_except_token['field_name'] = $all_fields_name;
        $json_encoded_data = json_encode($all_request_except_token);

        update_static_option('appointment_booking_page_form_fields',$json_encoded_data);
        return redirect()->back()->with(['msg' => __('Form Updated...'),'type' => 'success']);
    }
    public function settings(){
        return view($this->base_view_path.'appointment-settings');
    }
    public function settings_save(Request $request){
        $this->validate($request,[
            'appointment_single_information_tab_title' => 'nullable|string',
            'appointment_single_booking_tab_title' => 'nullable|string',
            'appointment_single_feedback_tab_title' => 'nullable|string',
            'appointment_single_appointment_booking_information_text' => 'nullable|string',
            'appointment_single_appointment_booking_button_text' => 'nullable|string',
            'appointment_single_appointment_booking_about_me_title' => 'nullable|string',
            'appointment_single_appointment_booking_educational_info_title' => 'nullable|string',
            'appointment_single_appointment_booking_additional_info_title' => 'nullable|string',
            'appointment_single_appointment_booking_client_feedback_title' => 'nullable|string',
            'appointment_single_appointment_booking_specialize_info_title' => 'nullable|string',
            'appointment_booking_success_page_title' => 'nullable|string',
            'appointment_booking_success_page_description' => 'nullable|string',
            'appointment_booking_cancel_page_title' => 'nullable|string',
            'appointment_booking_cancel_page_description' => 'nullable|string',
            'appointment_notify_mail' => 'required|email|max:191'
        ]);
        $fields_list = [
            'appointment_single_information_tab_title',
            'appointment_single_booking_tab_title',
            'appointment_single_feedback_tab_title' ,
            'appointment_single_appointment_booking_information_text',
            'appointment_single_appointment_booking_button_text' ,
            'appointment_single_appointment_booking_about_me_title' ,
            'appointment_single_appointment_booking_educational_info_title',
            'appointment_single_appointment_booking_additional_info_title',
            'appointment_single_appointment_booking_specialize_info_title',
            'appointment_single_appointment_booking_client_feedback_title',
            'appointment_booking_success_page_title',
            'appointment_booking_success_page_description',
            'appointment_booking_cancel_page_title',
            'appointment_booking_cancel_page_description',
            'appointment_page_booking_button_text',
            'appointment_notify_mail'
        ];
        foreach ($fields_list as $field){
            update_static_option($field,$request->$field);
        }
        return back()->with([
            'msg' => __('Settings Updated'),
            'type' => 'success'
        ]);
    }
    public function show_booing_time(Request $request){
        $edit_items = Appointment::find($request->id);
        $all_booking_time = AppointmentBookingTime::where('status' , 'publish')->get();
        return response()->json([
            'view'=>(String)View::make($this->base_view_path.'booking-time-component')->with([
                'edit_items'=> $edit_items,
                'all_booking_time'=> $all_booking_time
            ])
        ]);
        
    }
    public function search_appointment(Request $request){
        $appointment_category = AppointmentCategory::where('status','publish')->get();
        $all_appointment = '';
        $query = Appointment::query();
        $query->where(['appointment_status' => 'yes' ]);
        if (!empty($request->appointment_category_search)){
            $query->where(['categories_id' => $request->appointment_category_search ]);
        }
        if (!empty($request->appointment_max_price)){
            $query->where('price','<=',$request->appointment_max_price);
        }
        if (!empty($request->appointment_min_price)){
            $query->where('price','>=',$request->appointment_min_price);
        }
        if (!empty($request->appointment_title)){
            $query->where('title', 'LIKE', '%' . $request->appointment_title . '%');
        }
        if($request->appointment_category_search || $request->appointment_max_price || $request->appointment_min_price || $request->appointment_day || $request->appointment_title){
            $all_appointment = $query->get();
        }
        return view($this->base_view_path . 'appointment-search')->with([
            'appointment_category_search'=>$request->appointment_category_search,
            'appointment_title'=>$request->appointment_title,
            'appointment_max_price'=>$request->appointment_max_price,
            'appointment_min_price'=>$request->appointment_min_price,
            'appointment_day'=>$request->appointment_day,
            'appointment_category'=>$appointment_category,
            'all_appointment'=>$all_appointment,
        ]);
    }
    public function appointment_create()
    {
        return view($this->base_view_path . 'appointment-create');
    }
    public function appointment_create_page($id)
    {
        $appointment = Appointment::find($id);
        $all_booking_time = AppointmentBookingTime::where('status','publish')->get();
        $all_users = User::all();
        return view($this->base_view_path . 'appointment-create')->with([
            'appointment'=>$appointment,
            'all_booking_time'=>$all_booking_time,
            'all_users'=>$all_users
        ]);
    }
   public function appointment_user_info(Request $request){
        $user = User::find($request->id);
        return response()->json([
            'user'=> $user
        ]);
   }
   public function appointment_book(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'booking_date' => 'required|string|max:191',
            'appointment_id' => 'required|string|max:191',
            'booking_time_id' => 'required|string|max:191',
            'email' => 'required|email|max:191',
         ],[
             'name.required' => __('Name is required'),
             'email.required' => __('Email is required'),
             'booking_date.required' => __('Please Select Date'),
             'booking_time_id.required' => __('Please Select Time'),
         ]);
         $appointment = Appointment::findOrFail($request->appointment_id);
         if (empty($request->booking_id)){
             //check custom field validation
             $validated_data = $this->get_filtered_data_from_request(get_static_option('appointment_booking_page_form_fields'),$request);
             $all_attachment = $validated_data['all_attachment'];
             $all_field_serialize_data = $validated_data['field_data'];
             unset($all_field_serialize_data['captcha_token']);
             unset($all_field_serialize_data['transaction_id']);
             $booking_time = AppointmentBookingTime::find($all_field_serialize_data['booking_time_id']);
             $all_field_serialize_data['booking_time'] = $booking_time ? $booking_time->time : __('no time slot selected');
             unset($all_field_serialize_data['booking_time_id']);
             if (empty($request->selected_payment_gateway )){
                 unset($all_field_serialize_data['payment_gateway']);
             }
             //save content to database
             $new_appointment =  AppointmentBooking::create([
                 'custom_fields' => $all_field_serialize_data,
                 'all_attachment' => $all_attachment,
                 'email' =>  $request->email,
                 'name' => $request->name,
                 'total' => $appointment->price,
                 'appointment_id' => $appointment->id,
                 'user_id' => $request->user_id,
                 'payment_gateway' => $request->selected_payment_gateway ?? '',
                 'payment_track' => Str::random(10) . Str::random(10),
                 'transaction_id' => null,
                 'payment_status' => 'pending',
                 'booking_date' => $request->booking_date,
                 'booking_time_id' => $request->booking_time_id,
                 'status' => 'pending',
             ]);
         }else{
             $new_appointment  = AppointmentBooking::findOrFail($request->booking_id);
         }
         $max_appointment = AppointmentBooking::where(['appointment_id' => $appointment->id, 'booking_date' => date('d-m-y')])->count();
         if ( $max_appointment >= $appointment->max_appointment){
             $data['type'] = 'danger';
             $data['msg'] = __('no more appointment is not available for today');
             return back()->with($data);
         }
         $this->send_mail($new_appointment->id);
         return back()->with(['msg' => 'Appointment Booked Successfully','type' => 'success']);
 
   }
   public function send_mail($appointment_booking_id){
        $appointment_booking_details = AppointmentBooking::findOrFail($appointment_booking_id);
       try {
           Mail::to(get_static_option('appointment_notify_mail'))->send(new \App\Mail\AppointmentBooking($appointment_booking_details,'owner',__('You Have A New Appointment Booking - ').get_static_option('site_title')));
           Mail::to($appointment_booking_details->email)->send(new \App\Mail\AppointmentBooking($appointment_booking_details,'customer',__('Your Appointment Has Been Booked - ').get_static_option('site_title')));
       }catch (\Exception $e){

       }
    }
    public function get_filtered_data_from_request($option_value,$request){

        $all_attachment = [];
        $all_quote_form_fields = (array) json_decode($option_value);
        $all_field_type = isset($all_quote_form_fields['field_type']) ? (array) $all_quote_form_fields['field_type'] : [];
        $all_field_name = isset($all_quote_form_fields['field_name']) ? $all_quote_form_fields['field_name'] : [];
        $all_field_required = isset($all_quote_form_fields['field_required'])  ? (object) $all_quote_form_fields['field_required'] : [];
        $all_field_mimes_type = isset($all_quote_form_fields['mimes_type']) ? (object) $all_quote_form_fields['mimes_type'] : [];

        //get field details from, form request
        $all_field_serialize_data = $request->all();
        unset($all_field_serialize_data['_token']);
        if (isset($all_field_serialize_data['captcha_token'])){
            unset($all_field_serialize_data['captcha_token']);
        }


        if (!empty($all_field_name)){
            foreach ($all_field_name as $index => $field){
                $is_required = !empty($all_field_required) && property_exists($all_field_required,$index) ? $all_field_required->$index : '';
                $mime_type = !empty($all_field_mimes_type) && property_exists($all_field_mimes_type,$index) ? $all_field_mimes_type->$index : '';
                $field_type = isset($all_field_type[$index]) ? $all_field_type[$index] : '';
                if (!empty($field_type) && $field_type == 'file'){
                    unset($all_field_serialize_data[$field]);
                }
                $validation_rules = !empty($is_required) ? 'required|': '';
                $validation_rules .= !empty($mime_type) ? $mime_type : '';

                //validate field
                $this->validate($request,[
                    $field => $validation_rules
                ]);

                if ($field_type == 'file' && $request->hasFile($field)) {
                    $filed_instance = $request->file($field);
                    $file_extenstion = $filed_instance->getClientOriginalExtension();
                    $attachment_name = 'attachment-'.Str::random(32).'-'. $field .'.'. $file_extenstion;
                    $filed_instance->move('assets/uploads/attachment/applicant', $attachment_name);
                    $all_attachment[$field] = 'assets/uploads/attachment/applicant/' . $attachment_name;
                }
            }
        }
        return [
            'all_attachment' => $all_attachment,
            'field_data' => $all_field_serialize_data
        ];
    }

}
