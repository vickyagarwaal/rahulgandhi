<?php

namespace App\Http\Middleware;

use App\AppointmentBooking;
use App\Counterup;
use App\InfobarRightIcons;
use App\Language;
use App\Menu;
use App\Prescription;
use App\ProductOrder;
use App\SocialIcons;
use App\StaticOption;
use App\TopbarInfo;
use Closure;

class GlobalVariableMiddleware
{
    
    public function handle($request, Closure $next,$param = 'frontend')
    {
        $data = $this->$param();
        view()->share($data);

        return $next($request);
    }
    public function backend(){
        $pending_product_order = ProductOrder::where('status', 'pending')->count();
        $pending_appointment = AppointmentBooking::where('status', 'pending')->count();
        $pending_prescription = Prescription::where('status', 'pending')->count();

        $admin_languages = Language::where(['default'=>1,'status'=>'publish'])->first();
        $admin_default_lang = $admin_languages->slug;
        return [
          'home_page_variant_number' => get_static_option('home_page_variant'),
          'admin_default_lang' => $admin_default_lang,
          'pending_product_order' => $pending_product_order,
          'pending_appointment' => $pending_appointment,
          'pending_prescription' => $pending_prescription,
        ];
    }
    public function frontend(){
        $popup_id = get_static_option('popup_selected_id');
        $popup_details = \App\PopupBuilder::find($popup_id);
        $all_counterups  = Counterup::take(3)->get();
        $website_url = url('/');
        if (preg_match('/(xgenious)/',$website_url)){
            $popup_details = \App\PopupBuilder::inRandomOrder()->first();
        }
        $primary_menu = Menu::where(['status' => 'default'])->first();
        if(\Request::is('home/01')){
            $home_variant_number = '01';
        }
        elseif(\Request::is('home/02')){
            $home_variant_number = '02';
        }
        elseif(\Request::is('home/03')){
            $home_variant_number = '03';
        }
        elseif(\Request::is('home/04')){
            $home_variant_number = '04';
        }else{
            $home_variant_number = get_static_option('home_page_variant');
        }
        //make a function to call all static option by home page
        $static_option_arr = [
            'product_module_status',
            'site_white_logo',
            'site_google_analytics',
            'og_meta_image_for_site',
            'site_main_color_one',
            'site_main_color_two',
            'site_secondary_color',
            'site_heading_color',
            'site_paragraph_color',
            'heading_font',
            'heading_font_family',
            'body_font_family',
            'body_font_family',
            'site_rtl_enabled',
            'services_page_slug',
            'about_page_slug',
            'contact_page_slug',
            'blog_page_slug',
            'team_page_slug',
            'faq_page_slug',
            'works_page_slug',
            'site_third_party_tracking_code',
            'site_favicon',
            'home_page_variant',
            'item_license_status',
            'site_script_unique_key',
            'site_meta_description',
            'site_meta_tags',
            'site_title',
            'site_tag_line',
        ];
        $static_field_data = StaticOption::whereIn('option_name',$static_option_arr)->get()->mapWithKeys(function ($item) {
            return [$item->option_name => $item->option_value];
        })->toArray();

       return [
            'global_static_field_data' =>  $static_field_data,
            'popup_details' =>  $popup_details,
            'home_variant_number' =>  $home_variant_number,
            'all_counterups' =>  $all_counterups,
            'primary_menu' =>  $primary_menu->id,
        ];
    }
}
