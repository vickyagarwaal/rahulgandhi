<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Language;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function contact_page_settings(){
        return view('backend.pages.contact-page.contact-page-settings');
    }
    public function update_contact_page(Request $request){
        $this->validate($request,[
            'contact_page_map_section_location' => 'required|string',
            'contact_page_map_section_zoom' => 'required|string',
            'home_page_contact_us_section_title' => 'nullable|string',
            'home_page_contact_us_section_contact' => 'nullable|string',
            'home_page_contact_us_section_email' => 'nullable|string',
            'home_page_contact_us_section_address' => 'nullable|string',
        ]);
        $fields = [
            'contact_page_map_section_location',
            'contact_page_map_section_zoom',
            'home_page_contact_us_section_title',
            'home_page_contact_us_section_contact',
            'home_page_contact_us_section_email',
            'home_page_contact_us_section_address',
        ];
        foreach ($fields as $field) {
            if ($request->has($field)) {
                update_static_option($field, $request->$field);
            }
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function section_manage(){
        return view('backend.pages.contact-page.section-manage');
    }
    public function update_section_manage(Request $request){
        $this->validate($request,[
            'contact_page_map_section_status' => 'nullable|string',
            'contact_page_contact_section_status' => 'nullable|string',
        ]);
        $fields = ['map','contact','message'];
        foreach($fields as $field){
            $filed_name = 'contact_page_'.$field.'_section_status';
            update_static_option($filed_name,$request->$filed_name);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
}
