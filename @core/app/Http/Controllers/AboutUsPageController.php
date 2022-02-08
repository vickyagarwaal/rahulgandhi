<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Language;
use App\ProgressBar;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function concern_area()
    {
        return view('backend.pages.about-page.concern-area-settings');
    }
    public function update_concern_area(Request $request)
    {
        $this->validate($request, [
            'about_page_concern_section_title' => 'nullable|string',
            'about_page_concern_section_description' => 'nullable|string',
            'about_page_concern_section_name' => 'nullable|string',
            'about_page_concern_section_designation' => 'nullable|string',
            'about_page_concern_section_vdo_btn_url' => 'nullable|string',
            'about_page_concern_section_vdo_btn_status' => 'nullable|string',
            'about_page_concern_section_vdo_btn_icon' => 'nullable|string',
            'about_page_testimonial_section_img' => 'nullable|string',
            'about_page_testimonial_section_bg_img' => 'nullable|string',
            'about_page_testimonial_section_sign_img' => 'nullable|string',
        ]);
        $fields = [
            'about_page_concern_section_title',
            'about_page_concern_section_description',
            'about_page_concern_section_name',
            'about_page_concern_section_designation',
            'about_page_concern_section_vdo_btn_url',
            'about_page_concern_section_vdo_btn_status',
            'about_page_concern_section_vdo_btn_icon',
            'about_page_testimonial_section_img',
            'about_page_testimonial_section_bg_img',
            'about_page_testimonial_section_sign_img',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function progressbar_section()
    {
        $all_progressbar = ProgressBar::all();
        return view('backend.pages.about-page.progressbar-section')->with([
            'all_progressbar' => $all_progressbar
        ]);
    }
    public function update_progressbar_section(Request $request)
    {
        $this->validate($request, [
            'about_page_progressbar_section_title' => 'nullable|string',
            'about_page_progressbar_section_description' => 'nullable|string',
            'about_page_progressbar_section_bg' => 'nullable|string'
        ]);
        $fields = [
            'about_page_progressbar_section_title',
            'about_page_progressbar_section_description',
            'about_page_progressbar_section_bg'
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }

    public function section_manage()
    {
        return view('backend.pages.about-page.section-manage');
    }
    public function update_section_manage(Request $request)
    {
        $fields = ['concern','progressbar','image_gallery','counterup'];
        foreach($fields as $field){
            $filed_name = 'about_page_'.$field.'_section_status';
            update_static_option($filed_name,$request->$filed_name);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function whychoose_section()
    {
        return view('backend.pages.about-page.why-choose-us-section');
    }
    public function update_whychoose_section(Request $request)
    {
        $this->validate($request, [
            'about_page_whychoose_item' => 'nullable|string',
        ]);
        update_static_option('about_page_whychoose_item', $request->about_page_whychoose_item);
        return redirect()->back()->with(FlashMsg::settings_update());
    }
}
