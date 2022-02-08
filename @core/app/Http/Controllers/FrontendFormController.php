<?php

namespace App\Http\Controllers;

use App\Mail\BasicMail;
use App\Mail\ContactMessage;
use App\Mail\RequestQuote;
use App\Order;
use App\PricePlan;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontendFormController extends Controller
{

    public function send_contact_message(Request $request)
    {
        $validated_data = $this->get_filtered_data_from_request(get_static_option('contact_page_contact_form_fields'), $request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];
        
        unset($all_field_serialize_data['captcha_token']);
        
        $succ_msg = get_static_option('contact_mail_success_message');
        $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your contact!!');
        $return_va['msg'] = $success_message;
        $return_va['type'] = 'success';
        //implement google recaptcha if captch verify on
        if (!empty(get_static_option('site_google_captcha_enable'))){
            $this->validate($request,[
                'captcha_token' => 'required'
            ],[
                'captcha_token.required' => __('google captcha missing')
            ]);
            $google_captcha_result = google_captcha_check($request->captcha_token);
            if ($google_captcha_result['success']) {
                try {
                    Mail::to(get_static_option('site_global_email'))->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('You Have Contact Message from') . ' ' . get_static_option('site_title')));
                }catch (\Exception $e){

                }
                
                $return_va['msg'] = $success_message;
                $return_va['type'] = 'success';
                return response()->json($return_va);
                
            }
            $return_va['msg'] = __('captcha error, try after sometime');
            $return_va['type'] = 'warning';
            return response()->json($return_va);
        }

        try {
            Mail::to(get_static_option('site_global_email'))->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('You Have Contact Message from') . ' ' . get_static_option('site_title')));
        }catch (\Exception $e){

        }
        return response()->json($return_va);
    }
    public function send_quote_message(Request $request)
    {
        $validated_data = $this->get_filtered_data_from_request(get_static_option('quote_page_form_fields'), $request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];
        unset($all_field_serialize_data['captcha_token']);

        Quote::create([
            'custom_fields' => serialize($all_field_serialize_data),
            'status' => 'pending',
            'attachment' => serialize($all_attachment)
        ]);

        $to_mail = get_static_option('quote_page_form_mail') ?? get_static_option('site_global_email');
        $succ_msg = get_static_option('quote_mail_subject');
        $success_message = !empty($succ_msg) ? $succ_msg : 'Thanks for your quote. we will get back to you very soon.';

        if (!empty(get_static_option('site_google_captcha_enable'))){
            $this->validate($request,[
                'captcha_token' => 'required'
            ],[
                'captcha_token.required' => __('google captcha missing')
            ]);
            $google_captcha_result = google_captcha_check($request->captcha_token);
            if ($google_captcha_result['success']) {
                try {
                    Mail::to($to_mail)->send(new RequestQuote($all_field_serialize_data, $all_attachment));
                }catch (\Exception $e){

                }
                return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
            }

            return redirect()->back()->with(['msg' =>  __('captcha error, try after sometime'), 'type' => 'warning']);
        }
        try {
            //have to check mail
            Mail::to($to_mail)->send(new RequestQuote($all_field_serialize_data, $all_attachment));
        }catch (\Exception $e){

        }
       return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);

    }
    public function get_filtered_data_from_request($option_value, $request)
    {

        $all_attachment = [];
        $all_quote_form_fields = (array) json_decode($option_value);
        $all_field_type = isset($all_quote_form_fields['field_type']) ? (array) $all_quote_form_fields['field_type'] : [];
        $all_field_name = isset($all_quote_form_fields['field_name']) ? $all_quote_form_fields['field_name'] : [];
        $all_field_required = isset($all_quote_form_fields['field_required'])  ? (object) $all_quote_form_fields['field_required'] : [];
        $all_field_mimes_type = isset($all_quote_form_fields['mimes_type']) ? (object) $all_quote_form_fields['mimes_type'] : [];
        //get field details from, form request
        $all_field_serialize_data = $request->all();
        unset($all_field_serialize_data['_token']);
        if (!empty($all_field_name)) {
            foreach ($all_field_name as $index => $field) {
                $is_required = !empty($all_field_required) && property_exists($all_field_required, $index) ? $all_field_required->$index : '';
                $mime_type = !empty($all_field_mimes_type) && property_exists($all_field_mimes_type, $index) ? $all_field_mimes_type->$index : '';
                $field_type = isset($all_field_type[$index]) ? $all_field_type[$index] : '';
                if (!empty($field_type) && $field_type == 'file') {
                    unset($all_field_serialize_data[$field]);
                }
                $validation_rules = !empty($is_required) ? 'required|' : '';
                $validation_rules .= !empty($mime_type) ? $mime_type : '';
                //validate field
                $this->validate($request, [
                    $field => $validation_rules
                ]);
                if ($field_type == 'file' && $request->hasFile($field)) {
                    $filed_instance = $request->file($field);
                    $file_extenstion = $filed_instance->getClientOriginalExtension();
                    $attachment_name = 'attachment-' . Str::random(32) . '-' . $field . '.' . $file_extenstion;
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
