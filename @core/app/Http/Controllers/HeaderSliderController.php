<?php

namespace App\Http\Controllers;

use App\HeaderSlider;
use App\Helpers\FlashMsg;
use Illuminate\Http\Request;

class HeaderSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_header_sliders = HeaderSlider::all();
        return view('backend.pages.home-page-manage.header-slider-area')->with(['all_header_sliders' => $all_header_sliders]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'nullable|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'btn_txt' => 'nullable|string|max:191',
            'btn_url' => 'nullable|string|max:191',
            'btn_status' => 'nullable|string|max:191',
            'vdo_btn_txt' => 'nullable|string|max:191',
            'vdo_btn_url' => 'nullable|string|max:191',
            'vdo_btn_status' => 'nullable|string|max:191',
            'image' => 'nullable|string|max:191',
        ]);
        HeaderSlider::create($request->all());
        return redirect()->back()->with(FlashMsg::item_new());
    }

    public function update(Request $request){
        $this->validate($request,[
            'title' => 'nullable|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'btn_txt' => 'nullable|string|max:191',
            'btn_url' => 'nullable|string|max:191',
            'btn_status' => 'nullable|string|max:191',
            'vdo_btn_txt' => 'nullable|string|max:191',
            'vdo_btn_url' => 'nullable|string|max:191',
            'vdo_btn_status' => 'nullable|string|max:191',
            'image' => 'nullable|string|max:191',
        ]);
        HeaderSlider::find($request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'btn_txt' => $request->btn_txt,
            'btn_url' => $request->btn_url,
            'btn_status' => $request->btn_status,
            'vdo_btn_txt' => $request->vdo_btn_txt,
            'vdo_btn_url' => $request->vdo_btn_url,
            'vdo_btn_status' => $request->vdo_btn_status,
            'image' => $request->image,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());    
    }

    public function delete($id)
    {
        HeaderSlider::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());    
    }
    public function bulk_action(Request $request){
        HeaderSlider::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function header_slider_static(){
        return view('backend.pages.home-page-manage.header-slider-static');
    }
    public function update_header_slider_static(Request $request){
        $home_variant = get_static_option('home_page_variant');
        $this->validate($request,[
            "header_slider_home_'.$home_variant.'_static_title" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_subtitle" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_details" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_btn_title" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_btn_url" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_btn_status" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_image" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_right_section_text" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_right_section_sign" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_right_section_price" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_right_section_image" => 'nullable|string',
            "header_slider_home_'.$home_variant.'_static_right_section_status" => 'nullable|string',
        ]);
        $all_fields = [
            'header_slider_home_'.$home_variant.'_static_title',
            'header_slider_home_'.$home_variant.'_static_subtitle',
            'header_slider_home_'.$home_variant.'_static_details',
            'header_slider_home_'.$home_variant.'_static_btn_title',
            'header_slider_home_'.$home_variant.'_static_btn_url',
            'header_slider_home_'.$home_variant.'_static_image',
            'header_slider_home_'.$home_variant.'_static_right_section_text',
            'header_slider_home_'.$home_variant.'_static_right_section_sign',
            'header_slider_home_'.$home_variant.'_static_right_section_price',
            'header_slider_home_'.$home_variant.'_static_right_section_image',
        ];
        $switch_fields = [
            'header_slider_home_'.$home_variant.'_static_btn_status',
            'header_slider_home_'.$home_variant.'_static_right_section_status',
        ];
        foreach ($all_fields as $field) {
            if ($request->has($field)) {
            update_static_option($field, $request->$field);
            }
        }
        foreach ($switch_fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update()); 
    }
}
