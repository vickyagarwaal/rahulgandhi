<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\MenuBuilder\MenuBuilderSetup;
use App\PopupBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Language;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Spatie\Sitemap\SitemapGenerator;

class GeneralSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function site_identity()
    {
        return view('backend.general-settings.site-identity');
    }
    public function update_site_identity(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'nullable|string',
            'site_favicon' => 'nullable|string',
            'site_white_logo' => 'nullable|string',
            'site_breadcrumb_img' => 'nullable|string',
            'site_footer_img' => 'nullable|string',
        ]);
        $fields = [
            'site_logo',
            'site_favicon',
            'site_white_logo',  
            'site_breadcrumb_img',
            'site_footer_img'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function basic_settings()
    {
        return view('backend.general-settings.basic');
    }
    public function update_basic_settings(Request $request)
    {
        $this->validate($request, [
            'site_title' => 'nullable|string',
            'site_tag_line' => 'nullable|string',
            'site_footer_copyright' => 'nullable|string',
            'site_payment_gateway' => 'nullable|string',
            'disable_user_email_verify' => 'nullable|string',
            'site_maintenance_mode' => 'nullable|string',
            'admin_loader_animation' => 'nullable|string',
            'site_loader_animation' => 'nullable|string',
            'guest_order_system_status' => 'nullable|string',
            'site_main_color_one' => 'nullable|string',
            'site_main_color_two' => 'nullable|string',
            'site_secondary_color' => 'nullable|string',
            'site_heading_color' => 'nullable|string',
            'site_paragraph_color' => 'nullable|string',
            'admin_panel_rtl_status' => 'nullable|string',
            'site_google_captcha_enable' => 'nullable|string',
            'product_track_status' => 'nullable|string',
            
        ]);
        $all_fields = [
            'site_title',
            'site_tag_line',
            'site_footer_copyright',
            'site_payment_gateway',
            'disable_user_email_verify',
            'site_maintenance_mode',
            'admin_loader_animation',
            'site_loader_animation',
            'guest_order_system_status',
            'site_main_color_one',
            'site_main_color_two',
            'site_secondary_color',
            'site_heading_color',
            'site_paragraph_color',
            'admin_panel_rtl_status',
            'site_google_captcha_enable',
            'product_track_status',
        ];
        foreach ($all_fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function seo_settings()
    {
        return view('backend.general-settings.seo');
    }
    public function update_seo_settings(Request $request)
    {
        $this->validate($request, [
            'site_meta_tags' => 'nullable|string',
            'site_meta_description' => 'nullable|string',
            'og_meta_title' => 'nullable|string',
            'og_meta_description' => 'nullable|string',
            'og_meta_site_name' => 'nullable|string',
            'og_meta_url' => 'nullable|string',
            'og_meta_image' => 'nullable|string'
        ]);
        $all_fields = [
            'site_meta_tags',
            'site_meta_description',
            'og_meta_title',
            'og_meta_description',
            'og_meta_site_name',
            'og_meta_url',
            'og_meta_image'
        ];
        foreach ($all_fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function scripts_settings()
    {
        return view('backend.general-settings.thid-party');
    }
    public function update_scripts_settings(Request $request)
    {
        $this->validate($request, [
            'site_disqus_key' => 'nullable|string',
            'tawk_api_key' => 'nullable|string',
            'site_third_party_tracking_code' => 'nullable|string',
            'site_google_analytics' => 'nullable|string',
            'site_google_captcha_v3_site_key' => 'nullable|string',
            'site_google_captcha_v3_secret_key' => 'nullable|string',
        ]);
        $fields = [
            'site_disqus_key',
            'site_google_analytics',
            'tawk_api_key',
            'site_google_captcha_v3_site_key',
            'site_google_captcha_v3_secret_key',
            'site_third_party_tracking_code',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function email_template_settings()
    {
        return view('backend.general-settings.email-template');
    }
    public function update_email_template_settings(Request $request)
    {
        $this->validate($request, [
            'site_global_email' => 'required|string',
            'site_global_email_template' => 'required|string',
        ]);
        $fields = [
            'site_global_email',
            'site_global_email_template'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function email_settings()
    {
        return view('backend.general-settings.email-settings');
    }
    public function update_email_settings(Request $request)
    {
        $this->validate($request, [
            'order_mail_success_message' => 'required|string',
            'contact_mail_success_message' => 'required|string',
        ]);
        $fields = [
            'order_mail_success_message',
            'contact_mail_success_message'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function cache_settings()
    {
        return view('backend.general-settings.cache-settings');
    }
    public function update_cache_settings(Request $request)
    {
        $this->validate($request, [
            'cache_type' => 'required|string'
        ]);
        Artisan::call($request->cache_type . ':clear');
        return redirect()->back()->with(['msg' => __('Cache Cleaned'), 'type' => 'success']);
    }
    public function typography_settings()
    {
        $all_google_fonts = file_get_contents('assets/frontend/webfonts/google-fonts.json');
        return view('backend.general-settings.typograhpy')->with(['google_fonts' => json_decode($all_google_fonts)]);
    }
    public function get_single_font_variant(Request $request)
    {
        $all_google_fonts = file_get_contents('assets/frontend/webfonts/google-fonts.json');
        $decoded_fonts = json_decode($all_google_fonts, true);
        return response()->json($decoded_fonts[$request->font_family]);
    }
    public function update_typography_settings(Request $request)
    {
        $this->validate($request, [
            'body_font_family' => 'required|string|max:191',
            'body_font_variant' => 'required',
            'heading_font' => 'nullable|string',
            'heading_font_family' => 'nullable|string|max:191',
            'heading_font_variant' => 'nullable',
        ]);

        $save_data = [
            'body_font_family',
            'heading_font_family',
        ];
        foreach ($save_data as $item) {
            update_static_option($item, $request->$item);
        }
        $body_font_variant = !empty($request->body_font_variant) ?  $request->body_font_variant : ['regular'];
        $heading_font_variant = !empty($request->heading_font_variant) ?  $request->heading_font_variant : ['regular'];

        update_static_option('heading_font', $request->heading_font);
        update_static_option('body_font_variant', serialize($body_font_variant));
        update_static_option('heading_font_variant', serialize($heading_font_variant));

        return redirect()->back()->with(['msg' => __('Typography Settings Updated..'), 'type' => 'success']);
    }
    public function smtp_settings()
    {
        return view('backend.general-settings.smtp-settings');
    }
    public function update_smtp_settings(Request $request)
    {
        $this->validate($request, [
            'site_smtp_mail_host' => 'required|string',
            'site_smtp_mail_mailer' => 'required|string',
            'site_smtp_mail_port' => 'required|string',
            'site_smtp_mail_username' => 'required|string',
            'site_smtp_mail_password' => 'required|string',
            'site_smtp_mail_encryption' => 'required|string'
        ]);
        $fields = [
            'site_smtp_mail_mailer',
            'site_smtp_mail_host',
            'site_smtp_mail_port',
            'site_smtp_mail_username',
            'site_smtp_mail_password',
            'site_smtp_mail_encryption',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        $env_val['MAIL_MAILER'] = !empty($request->site_smtp_mail_mailer) ? $request->site_smtp_mail_mailer : 'smtp';
        $env_val['MAIL_HOST'] = !empty($request->site_smtp_mail_host) ? $request->site_smtp_mail_host : 'YOUR_SMTP_MAIL_HOST';
        $env_val['MAIL_PORT'] = !empty($request->site_smtp_mail_port) ? $request->site_smtp_mail_port : 'YOUR_SMTP_MAIL_POST';
        $env_val['MAIL_USERNAME'] = !empty($request->site_smtp_mail_username) ? $request->site_smtp_mail_username : 'YOUR_SMTP_MAIL_USERNAME';
        $env_val['MAIL_PASSWORD'] = !empty($request->site_smtp_mail_password) ? $request->site_smtp_mail_password : 'YOUR_SMTP_MAIL_USERNAME_PASSWORD';
        $env_val['MAIL_ENCRYPTION'] = !empty($request->site_smtp_mail_encryption) ? $request->site_smtp_mail_encryption : 'YOUR_SMTP_MAIL_ENCRYPTION';

        setEnvValue($env_val);

        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function page_settings()
    {
        $all_languages = Language::all();
        return view('backend.general-settings.page-settings')->with(['all_languages' => $all_languages]);
    }
    public function update_page_settings(Request $request)
    {

        $page_list = MenuBuilderSetup::Instance()->static_pages_list();

        foreach ($page_list as $slug_field) {
            $field = $slug_field.'_page_slug';
            $this->validate($request, [
                $field => 'nullable|string|max:191',
            ]);
            update_static_option($field, Str::slug($request->$field));
        }
        foreach ($page_list as $field) {
            $pname = $field."_page_name";
            $pmeta_tags = $field."_page_name";
            $pmeta_description = $field."_page_meta_description";
            $this->validate($request, [
                $pname =>  'nullable|string',
                $pmeta_tags =>  'nullable|string',
                $pmeta_description =>  'nullable|string',
            ]);

            update_static_option($pname, $request->$pname);
            update_static_option($pmeta_tags, $request->$pmeta_tags);
            update_static_option($pmeta_description, $request->$pmeta_description);
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function payment_settings()
    {
        return view('backend.general-settings.payment-gateway');
    }

    public function update_payment_settings(Request $request)
    {
        $this->validate($request, [
            'razorpay_preview_logo' => 'nullable|string|max:191',
            'stripe_preview_logo' => 'nullable|string|max:191',
            'paypal_gateway' => 'nullable|string|max:191',
            'paypal_preview_logo' => 'nullable|string|max:191',
            'paypal_client_id' => 'nullable|string|max:191',
            'paypal_secret' => 'nullable|string|max:191',
            'paytm_gateway' => 'nullable|string|max:191',
            'paytm_preview_logo' => 'nullable|string|max:191',
            'paytm_merchant_key' => 'nullable|string|max:191',
            'paytm_merchant_mid' => 'nullable|string|max:191',
            'paytm_merchant_website' => 'nullable|string|max:191',
            'site_global_currency' => 'nullable|string|max:191',
            'site_manual_payment_name' => 'nullable|string|max:191',
            'manual_payment_preview_logo' => 'nullable|string|max:191',
            'site_manual_payment_description' => 'nullable|string',
            'razorpay_key' => 'nullable|string|max:191',
            'razorpay_secret' => 'nullable|string|max:191',
            'stripe_publishable_key' => 'nullable|string|max:191',
            'stripe_secret_key' => 'nullable|string|max:191',
            'site_global_payment_gateway' => 'nullable|string|max:191',
            'paystack_merchant_email' => 'nullable|string|max:191',
            'paystack_preview_logo' => 'nullable|string|max:191',
            'paystack_public_key' => 'nullable|string|max:191',
            'paystack_secret_key' => 'nullable|string|max:191',
            'cash_on_delivery_gateway' => 'nullable|string|max:191',
            'cash_on_delivery_preview_logo' => 'nullable|string|max:191',
            'mollie_preview_logo' => 'nullable|string|max:191',
            'mollie_public_key' => 'nullable|string|max:191',
        ]);
        $save_data = [
            'cash_on_delivery_preview_logo',
            'stripe_preview_logo',
            'paystack_preview_logo',
            'paystack_public_key',
            'paystack_secret_key',
            'paystack_merchant_email',
            'razorpay_preview_logo',
            'paypal_preview_logo',
            'paypal_app_client_id',
            'paypal_app_secret',
            'paytm_preview_logo',
            'paytm_merchant_key',
            'paytm_merchant_mid',
            'paytm_merchant_website',
            'site_global_currency',
            'manual_payment_preview_logo',
            'site_manual_payment_name',
            'site_manual_payment_description',
            'razorpay_key',
            'razorpay_secret',
            'stripe_publishable_key',
            'stripe_secret_key',
            'site_global_payment_gateway',
            'site_usd_to_ngn_exchange_rate',
            'site_euro_to_ngn_exchange_rate',
            'mollie_public_key',
            'mollie_preview_logo',
            'flutterwave_preview_logo',
            'flutterwave_secret_key',
            'flutterwave_public_key',
            'site_currency_symbol_position',
            'site_default_payment_gateway',
        ];
        foreach ($save_data as $item) {
            update_static_option($item, $request->$item);
        }
        update_static_option('manual_payment_gateway', $request->manual_payment_gateway);
        update_static_option('paypal_gateway', $request->paypal_gateway);
        update_static_option('paytm_test_mode', $request->paytm_test_mode);
        update_static_option('paypal_test_mode', $request->paypal_test_mode);
        update_static_option('paytm_gateway', $request->paytm_gateway);
        update_static_option('razorpay_gateway', $request->razorpay_gateway);
        update_static_option('stripe_gateway', $request->stripe_gateway);
        update_static_option('paystack_gateway', $request->paystack_gateway);
        update_static_option('mollie_gateway', $request->mollie_gateway);
        update_static_option('cash_on_delivery_gateway', $request->cash_on_delivery_gateway);
        update_static_option('flutterwave_gateway', $request->flutterwave_gateway);

        $env_val['PAYSTACK_PUBLIC_KEY'] = $request->paystack_public_key ?: 'pk_test_081a8fcd9423dede2de7b4c3143375b5e5415290';
        $env_val['PAYSTACK_SECRET_KEY'] = $request->paystack_secret_key ?: 'sk_test_c874d38f8d08760efc517fc83d8cd574b906374f';
        $env_val['MERCHANT_EMAIL'] = $request->paystack_merchant_email ?: 'example@gmail.com';
        $env_val['MOLLIE_KEY'] = $request->mollie_public_key ?: 'test_SMWtwR6W48QN2UwFQBUqRDKWhaQEvw';
        $env_val['RAVE_PUBLIC_KEY'] = $request->flutterwave_public_key ?: 'FLWPUBK-d981d2a182ba72915b699603c2db82e0-X';
        $env_val['RAVE_SECRET_KEY'] = $request->flutterwave_secret_key ?: 'FLWSECK-e33b022937c2a64446dca55dbb7ceb08-X';
        $env_val['PAYPAL_MODE'] =  !empty($request->paypal_test_mode) ? 'sandbox' : 'live';
        $env_val['PAYPAL_CLIENT_ID'] = $request->paypal_app_client_id ?: 'ATx-SYQyPtXHw1bZaBDhJUZabxbutIqAqqZORgvgEoK_-9MrAkUzYkbt8pSnUyKNEdNN3aJt8tcpcY1I';
        $env_val['PAYPAL_SECRET'] = $request->paypal_app_secret ?: 'ELJCWPUabUnnMamfw5-ZxaUsvir3KAJrPnAcSeS11znsroi45HP0p7y7vGZcYsBsAAi7Ou6kelCpj69K';
        $env_val['PAYTM_ENVIRONMENT'] = !empty($request->paytm_test_mode) ? 'local' : 'production';
        $env_val['PAYTM_MERCHANT_ID'] = $request->paytm_merchant_mid ?: 'Digita57697814558795';
        $env_val['PAYTM_MERCHANT_KEY'] = '"' . $request->paytm_merchant_key . '"' ?: 'dv0XtmsPYpewNag&';
        $env_val['PAYTM_MERCHANT_WEBSITE'] = '"' . $request->paytm_merchant_website . '"' ?: 'WEBSTAGING';
        $env_val['PAYTM_CHANNEL'] = '"' . $request->paytm_channel . '"' ?: 'WEB';
        $env_val['PAYTM_INDUSTRY_TYPE'] = '"' . $request->paytm_industry_type . '"' ?: 'Retail';
        $env_val['RAVE_TITLE'] =  '"' . get_static_option('site_' . get_default_language() . '_title') . '"';
        $env_val['RAVE_ENVIRONMENT'] =  getenv('APP_ENV') === 'local' ? "staging" : "live";
        $env_val['FLW_PUBLIC_KEY'] = $request->flutterwave_public_key ?: 'FLWPUBK-d981d2a182ba72915b699603c2db82e0-X';
        $env_val['FLW_SECRET_KEY'] = $request->flutterwave_secret_key ?: 'FLWSECK-e33b022937c2a64446dca55dbb7ceb08-X';

        setEnvValue($env_val);

        $global_currency = get_static_option('site_global_currency');
        $currency_filed_name = 'site_' . strtolower($global_currency) . '_to_usd_exchange_rate';
        $inr_currency_filed_name = 'site_' . strtolower($global_currency) . '_to_inr_exchange_rate';
        $ngn_currency_filed_name = 'site_' . strtolower($global_currency) . '_to_ngn_exchange_rate';

        update_static_option('site_' . strtolower($global_currency) . '_to_usd_exchange_rate', $request->$currency_filed_name);
        update_static_option('site_' . strtolower($global_currency) . '_to_inr_exchange_rate', $request->$inr_currency_filed_name);
        update_static_option('site_' . strtolower($global_currency) . '_to_ngn_exchange_rate', $request->$ngn_currency_filed_name);

        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function custom_css_settings()
    {
        $custom_css = '/* Write Custom Css Here */';
        if (file_exists('assets/frontend/css/dynamic-style.css')) {
            $custom_css = file_get_contents('assets/frontend/css/dynamic-style.css');
        }
        return view('backend.general-settings.custom-css')->with(['custom_css' => $custom_css]);
    }

    public function update_custom_css_settings(Request $request)
    {
        file_put_contents('assets/frontend/css/dynamic-style.css', $request->custom_css_area);

        return redirect()->back()->with(['msg' => __('Custom Style Successfully Added...'), 'type' => 'success']);
    }

    public function custom_js_settings()
    {
        $custom_js = '/* Write Custom js Here */';
        if (file_exists('assets/frontend/js/dynamic-script.js')) {
            $custom_js = file_get_contents('assets/frontend/js/dynamic-script.js');
        }
        return view('backend.general-settings.custom-js')->with(['custom_js' => $custom_js]);
    }

    public function update_custom_js_settings(Request $request)
    {
        file_put_contents('assets/frontend/js/dynamic-script.js', $request->custom_js_area);

        return redirect()->back()->with(['msg' => __('Custom Script Successfully Added...'), 'type' => 'success']);
    }
    public function gdpr_settings()
    {
        return view('backend.general-settings.gdpr');
    }
    public function update_gdpr_cookie_settings(Request $request)
    {
        $this->validate($request, [
            'site_gdpr_cookie_title' => 'nullable|string|max:191',
            'site_gdpr_cookie_message' => 'nullable|string|max:191',
            'site_gdpr_cookie_more_info_label' => 'nullable|string|max:191',
            'site_gdpr_cookie_more_info_link' => 'nullable|string|max:191',
            'site_gdpr_cookie_accept_button_label' => 'nullable|string|max:191',
            'site_gdpr_cookie_decline_button_label' => 'nullable|string|max:191',
            'site_gdpr_cookie_expire' => 'nullable|string|max:191',
            'site_gdpr_cookie_delay' => 'nullable|string|max:191',
            'site_gdpr_cookie_enabled' => 'nullable|string|max:191'
        ]);
        $fields = [
            'site_gdpr_cookie_title',
            'site_gdpr_cookie_message',
            'site_gdpr_cookie_more_info_label',
            'site_gdpr_cookie_more_info_link',
            'site_gdpr_cookie_accept_button_label',
            'site_gdpr_cookie_decline_button_label',
            'site_gdpr_cookie_expire',
            'site_gdpr_cookie_delay',
            'site_gdpr_cookie_enabled'
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function license_settings()
    {
        return view('backend.general-settings.license-settings');
    }
    public function update_license_settings(Request $request)
    {
        $this->validate($request, [
            'item_purchase_key' => 'required|string|max:191'
        ]);
        $response = Http::post('https://xgenious.com/api/v2/license/new', [
            'purchase_code' => $request->item_purchase_key,
            'site_url' => url('/'),
            'item_unique_key' => 'WySpcEH8eib18zRXwfBIEEC1VAxjwlzj',
        ]);
        $result = $response->json();
        update_static_option('item_purchase_key', $request->item_purchase_key);
        update_static_option('item_license_status', $result['license_status']);
        update_static_option('item_license_msg', $result['msg']);

        $type = 'verified' == $result['license_status'] ? 'success' : 'danger';
        setcookie("site_license_check", "", time() - 3600, '/');
        $license_info = [
            "item_license_status" => $result['license_status'],
            "last_check" => time(),
            "purchase_code" => get_static_option('item_purchase_key'),
            "xgenious_app_key" => env('XGENIOUS_API_KEY'),
            "author" => env('XGENIOUS_API_AUTHOR'),
            "message" => $result['msg']
        ];
        file_put_contents('@core/license.json', json_encode($license_info));

        return redirect()->back()->with(['msg' => $result['msg'], 'type' => $type]);
    }
    public function popup_settings()
    {
        $all_popup = PopupBuilder::all();
        return view('backend.general-settings.popup-settings')->with(['all_popup' => $all_popup]);
    }
    public function update_popup_settings(Request $request)
    {
        $this->validate($request, [
            'popup_enable_status' => 'nullable|string',
            'popup_delay_time' => 'nullable|string',
            'popup_selected_id' => 'nullable|string',
        ]);
        $fields = [
            'popup_enable_status',
            'popup_delay_time',
            'popup_selected_id'
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function sitemap_settings()
    {
        $all_sitemap = glob('sitemap/*');
        return view('backend.general-settings.sitemap-settings')->with(['all_sitemap' => $all_sitemap]);
    }

    public function update_sitemap_settings(Request $request)
    {
        $this->validate($request, [
            'site_url' => 'required|url',
            'title' => 'nullable|string',
        ]);
        $title = $request->title ? $request->title : time();
        SitemapGenerator::create($request->site_url)->writeToFile('sitemap/sitemap-' . $title . '.xml');
        return redirect()->back()->with([
            'msg' => __('Sitemap Generated..'),
            'type' => 'success'
        ]);
    }

    public function delete_sitemap_settings(Request $request)
    {
        if (file_exists($request->sitemap_name)) {
            @unlink($request->sitemap_name);
        }
        return redirect()->back()->with(['msg' => __('Sitemap Deleted...'), 'type' => 'danger']);
    }



}
