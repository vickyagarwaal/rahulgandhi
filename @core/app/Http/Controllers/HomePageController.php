<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function section_manage()
    {
        return view('backend.pages.section-manage');
    }
    public function update_section_manage(Request $request){
        $home_variant = get_static_option('home_page_variant');
        if($home_variant == '01')
            $fields = ['topbar','navbar','header_slider','header_bottom','medical_care','concern','service','expert','appointment','testimonial','image_gallery','latest_blog','counterup'];
        elseif($home_variant == '02')
            $fields = ['topbar','infobar','navbar','header_slider','concern_area','keyfeature','service','call_to_us','appointment','testimonial','image_gallery','latest_blog','counterup'];
        elseif($home_variant == '03')
            $fields = ['topbar','infobar','navbar','header_slider','header_bottom','keyfeature','product_category','special_offer','popular_products','testimonial','counterup'];
        elseif($home_variant == '04')
            $fields = ['topbar','navbar','header_slider','header_bottom','keyfeature','featured_products','special_offer','popular_products','testimonial','product_category','counterup'];

        foreach($fields as $field){
            $filed_name = 'home_page_'.$field.'_section_status';
            update_static_option($filed_name,$request->$filed_name);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function counterup_settings()
    {
        return view('backend.pages.home-page-manage.counterup-settings');
    }
    public function update_counterup_settings(Request $request)
    {
        $this->validate($request, [
            'counterup_bg_img' => 'required|string',
        ]);
        update_static_option('counterup_bg_img', $request->counterup_bg_img);
        return redirect()->back()->with([
            'msg' => __('Settings Updated Successfully...'),
            'type' => 'success'
        ]);
    }
    public function call_us_banner_area()
    {
        return view('backend.pages.home-page-manage.call-us-now-settings');
    }
    public function update_call_us_banner_area(Request $request)
    {
        $this->validate($request, [
            'home_page_quote_support_image' => 'nullable|string',
            'home_page_quote_bg_image' => 'nullable|string',
        ]);
        $fields = [
            'home_page_quote_support_image',
            'home_page_quote_bg_image'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with([
            'msg' => __('Settings Updated Successfully...'),
            'type' => 'success'
        ]);
    }
    public function header_section(){
        return view('backend.pages.home-page-manage.header-section');
    }
    public function update_header_section(Request $request){
        return $request->all();
        
    }
    // @medheal
    public function testimonial_area()
    {
        return view('backend.pages.home-page-manage.testimonial-settings');
    }
    public function update_testimonial_area(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            "home_page_testimonial_section_title" => 'nullable|string',
            "home_page_testimonial_section_home_'.$home_variant.'_display_items" => 'nullable|string',
            "home_page_testimonial_section_bg_var1" => 'nullable|string',
            "home_page_testimonial_section_bg_var2" => 'nullable|string',
        ]);
        $fields = [
            'home_page_testimonial_section_title',
            'home_page_testimonial_section_home_'.$home_variant.'_display_items',
            'home_page_testimonial_section_bg_var1',
            'home_page_testimonial_section_bg_var2',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function medical_care_info()
    {
        return view('backend.pages.home-page-manage.medical-care-info-settings');
    }
    public function update_medical_care_info(Request $request)
    {
        $this->validate($request, [
            "home_page_medical_care_section_info_title" => 'nullable|string',
            "home_page_medical_care_section_info_details" => 'nullable|string',
            "home_page_medical_care_section_opening_hour_title" => 'nullable|string',
            "home_page_medical_care_section_appointment_title" => 'nullable|string',
            "home_page_medical_care_section_appointment_button_text" => 'nullable|string',
            "home_page_medical_care_section_opening_bg" => 'nullable|string',
            "home_page_medical_care_section_appointment_bg" => 'nullable|string',
        ]);
        $fields = [
            'home_page_medical_care_section_info_title',
            'home_page_medical_care_section_info_details',
            'home_page_medical_care_section_opening_hour_title',
            'home_page_medical_care_section_appointment_title',
            'home_page_medical_care_section_appointment_button_text',
            'home_page_medical_care_section_opening_bg',
            'home_page_medical_care_section_appointment_bg'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function concern_area()
    {
        return view('backend.pages.home-page-manage.concern-area-settings');
    }
    public function update_concern_area(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_concern_section_title' => 'nullable|string',
            'home_page_concern_section_description' => 'nullable|string',
            'home_page_concern_section_name' => 'nullable|string',
            'home_page_concern_section_designation' => 'nullable|string',
            'home_page_concern_section_vdo_btn_url' => 'nullable|string',
            'home_page_concern_section_vdo_btn_status' => 'nullable|string',
            'home_page_concern_section_vdo_btn_icon' => 'nullable|string',
            'home_page_testimonial_section_'.$home_variant.'_img' => 'nullable|string',
            'home_page_testimonial_section_'.$home_variant.'_bg_img' => 'nullable|string',
            'home_page_testimonial_section_'.$home_variant.'_sign_img' => 'nullable|string',
        ]);
        $fields = [
            'home_page_concern_section_title',
            'home_page_concern_section_description',
            'home_page_concern_section_name',
            'home_page_concern_section_designation',
            'home_page_concern_section_vdo_btn_url',
            'home_page_concern_section_vdo_btn_icon',
            'home_page_testimonial_section_'.$home_variant.'_img',
            'home_page_testimonial_section_'.$home_variant.'_bg_img',
            'home_page_testimonial_section_'.$home_variant.'_sign_img',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        if($home_variant == '02'){
            update_static_option('home_page_concern_section_vdo_btn_status', $request->home_page_concern_section_vdo_btn_status);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function latest_blog_area()
    {
        return view('backend.pages.home-page-manage.latest-blog-settings');
    }
    public function update_latest_blog_area(Request $request)
    {
        $this->validate($request, [
            'home_page_latest_blog_section_title' => 'required|string',
            'home_page_latest_blog_section_description' => 'nullable|string',
            'home_page_latest_blog_section_display_item' => 'required|string',
        ]);
        $fields = [
            'home_page_latest_blog_section_title',
            'home_page_latest_blog_section_description',
            'home_page_latest_blog_section_display_item',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function what_we_do()
    {
        return view('backend.pages.home-page-manage.what-we-do-settings');
    }
    public function update_what_we_do(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_what_we_do_section_title' => 'required|string',
            'home_page_what_we_do_section_description' => 'nullable|string',
            'home_page_what_we_do_section_display_item_home_'.$home_variant.'' => 'required|string',
        ]);
        $fields = [
            'home_page_what_we_do_section_title',
            'home_page_what_we_do_section_description',
            'home_page_what_we_do_section_display_item_home_'.$home_variant.'',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function expert_area()
    {
        return view('backend.pages.home-page-manage.expert-area-settings');
    }
    public function update_expert_area(Request $request)
    {
        $this->validate($request, [
            'home_page_expert_section_title' => 'nullable|string',
            'home_page_expert_section_bg' => 'nullable|string',
            'home_page_expert_section_support_title' => 'nullable|string',
            'home_page_expert_section_support_details' => 'nullable|string',
            'home_page_expert_section_support_icon' => 'nullable|string',
            'home_page_expert_section_title_1' => 'nullable|string',
            'home_page_expert_section_bg_1' => 'nullable|string',
            'home_page_expert_section_support_icon_1' => 'nullable|string',
            'home_page_expert_section_title_2' => 'nullable|string',
            'home_page_expert_section_bg_2' => 'nullable|string',
            'home_page_expert_section_support_icon_2' => 'nullable|string',
            'home_page_expert_section_icon' => 'nullable|string',
        ]);
        $fields = [
            'home_page_expert_section_title',
            'home_page_expert_section_bg',
            'home_page_expert_section_support_title',
            'home_page_expert_section_support_details',
            'home_page_expert_section_support_icon',
            'home_page_expert_section_title_1',
            'home_page_expert_section_bg_1',
            'home_page_expert_section_support_icon_1',
            'home_page_expert_section_title_2',
            'home_page_expert_section_bg_2',
            'home_page_expert_section_support_icon_2',
            'home_page_expert_section_icon',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function call_to_us()
    {
        return view('backend.pages.home-page-manage.call-to-us-area-settings');
    }
    public function update_call_to_us(Request $request)
    {
        $this->validate($request, [
            'home_page_call_to_us_section_title' => 'nullable|string',
            'home_page_call_to_us_section_support_title' => 'nullable|string',
            'home_page_call_to_us_section_support_details' => 'nullable|string',
            'home_page_call_to_us_section_support_icon' => 'nullable|string',
        ]);
        $fields = [
            'home_page_call_to_us_section_title',
            'home_page_call_to_us_section_support_title',
            'home_page_call_to_us_section_support_details',
            'home_page_call_to_us_section_support_icon'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function special_offer_area()
    {
    return view('backend.pages.home-page-manage.special-offer-area-settings');
    }
    public function update_special_offer_area(Request $request)
    {
        $home_page_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_special_offer_section_title' => 'nullable|string',
            'home_page_special_offer_section_details' => 'nullable|string',
            'home_page_special_offer_section_title_right' => 'nullable|string',
            'home_page_special_offer_section_details_right' => 'nullable|string',
            'home_page_special_offer_section_offer_end_date' => 'nullable|string',
            'home_page_special_offer_section_bg' => 'nullable|string',
            'home_page_special_offer_section_bg_2' => 'nullable|string',
            'home_page_special_offer_section_btn_status' => 'nullable|string',
            'home_page_special_offer_section_btn_txt' => 'nullable|string',
            'home_page_special_offer_section_btn_url'  => 'nullable|string',
            'home_page_special_offer_section_bg_right' => 'nullable|string',
            'home_page_special_offer_section_btn_status_right' => 'nullable|string',
            'home_page_special_offer_section_btn_txt_right' => 'nullable|string',
            'home_page_special_offer_section_btn_url_right'  => 'nullable|string',
        ]);
        $fields = [
            'home_page_special_offer_section_title',
            'home_page_special_offer_section_details',
            'home_page_special_offer_section_title_right',
            'home_page_special_offer_section_details_right',
            'home_page_special_offer_section_offer_end_date',
            'home_page_special_offer_section_bg',
            'home_page_special_offer_section_bg_2',
            'home_page_special_offer_section_btn_txt',
            'home_page_special_offer_section_btn_url' ,
            'home_page_special_offer_section_bg_right',
            'home_page_special_offer_section_btn_txt_right',
            'home_page_special_offer_section_btn_url_right',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        if($home_page_variant == '03'){
            update_static_option('home_page_special_offer_section_btn_status', $request->home_page_special_offer_section_btn_status);
        }else{
            update_static_option('home_page_special_offer_section_btn_status_right', $request->home_page_special_offer_section_btn_status_right);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function product_by_category()
    {
    return view('backend.pages.home-page-manage.product-category-area-settings');
    }
    public function update_product_by_category(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_product_category_section_title' => 'nullable|string',
            'home_page_product_category_section_display_item_home_'.$home_variant.'' => 'required|string',
        ]);
        $fields = [
            'home_page_product_category_section_title',
            'home_page_product_category_section_display_item_home_'.$home_variant.'',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function popular_product()
    {
    return view('backend.pages.home-page-manage.popular-product-area-settings');
    }
    public function update_popular_product(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_popular_product_section_title' => 'nullable|string',
            'home_page_popular_product_section_display_item_home_'.$home_variant.'' => 'required|string',
        ]);
        $fields = [
            'home_page_popular_product_section_title',
            'home_page_popular_product_section_display_item_home_'.$home_variant.'',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function featured_product()
    {
    return view('backend.pages.home-page-manage.featured-product-area-settings');
    }
    public function update_featured_product(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_featured_product_section_title' => 'nullable|string',
            'home_page_featured_product_section_display_item_home_'.$home_variant.'' => 'required|string',
        ]);
        $fields = [
            'home_page_featured_product_section_title',
            'home_page_featured_product_section_display_item_home_'.$home_variant.'',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function best_seller_product()
    {
    return view('backend.pages.home-page-manage.best-seller-product-area-settings');
    }
    public function update_best_seller_product(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request, [
            'home_page_best_seller_product_section_title' => 'nullable|string',
            'home_page_best_seller_product_section_display_item_home_'.$home_variant.'' => 'required|string',
        ]);
        $fields = [
            'home_page_best_seller_product_section_title',
            'home_page_best_seller_product_section_display_item_home_'.$home_variant.'',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function appointment_area()
    {
        return view('backend.pages.home-page-manage.appointment-area-settings');
    }
    public function update_appointment_area(Request $request)
    {
        $this->validate($request, [
            'home_page_appointment_section_title' => 'nullable|string',
            'home_page_appointment_section_description' => 'nullable|string',
            'home_page_appointment_section_display_item' => 'nullable|string',
        ]);
        $fields = [
            'home_page_appointment_section_title',
            'home_page_appointment_section_description',
            'home_page_appointment_section_display_item',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function navbar_settings(){
        return view('backend.pages.navbar-settings');
    }
    public function update_navbar_settings(Request $request){
        $this->validate($request,[
            'navbar_search_area' => 'nullable|string',
            'navbar_wishlist_area' => 'nullable|string',
            'navbar_shopping_area' => 'nullable|string',
            'shopping_cart_icon' => 'nullable|string',
            'wishlist_cart_icon' => 'nullable|string',
        ]);
        $fields = [
            'navbar_search_area',
            'navbar_wishlist_area',
            'navbar_shopping_area',
            'shopping_cart_icon',
            'wishlist_cart_icon',
        ];
        foreach ($fields as $field){
                update_static_option($field,$request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    
}
