<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Language;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function service_page_settings(){
        return view('backend.pages.service.service-page-settings');
    }
    public function update_service_page_settings(Request $request){
        $this->validate($request,[
            'service_page_title' => 'required|string|max:191',
            'service_page_decription' => 'nullable|string',
            'service_page_counterup_section_status' => 'nullable|string',
            'service_page_service_items' => 'required|string|max:191',
        ]);
        update_static_option('service_page_decription', $request->service_page_decription);
        update_static_option('service_page_title', $request->service_page_title);
        update_static_option('service_page_service_items', $request->service_page_service_items);
        update_static_option('service_page_counterup_section_status', $request->service_page_counterup_section_status);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function service_single_page_settings(){
        return view('backend.pages.service.service-single-settings');
    }
    public function update_service_single_page_settings(Request $request)
    {
        $this->validate($request,[
            'service_single_page_counterup_section_status' => 'nullable|string',
        ]);
        update_static_option('service_single_page_counterup_section_status', $request->service_single_page_counterup_section_status);
        return redirect()->back()->with(FlashMsg::item_update());
    }
}
