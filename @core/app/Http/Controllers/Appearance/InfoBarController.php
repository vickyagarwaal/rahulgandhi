<?php

namespace App\Http\Controllers\Appearance;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\Infobar;
use App\InfobarRightIcons;
use App\Language;
use App\SocialIcons;
use Illuminate\Http\Request;

class InfoBarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_infobar_items = Infobar::all();
        return view('backend.appearance.infobar-area-settings')->with([
            'all_infobar_items' => $all_infobar_items
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
           'title' => 'required|string',
           'icon' => 'required|string',
           'details' => 'required|string',
        ]);
        Infobar::create($request->all());
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'icon' => 'required|string',
            'details' => 'required|string',
        ]);
        Infobar::find($request->id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'details' => $request->details,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());

    }
    public function delete(Request $request,$id){
        Infobar::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());

    }
    public function bulk_action(Request $request){
        Infobar::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function update_infobar_right_section(Request $request){
        $all_languages = Language::all();
        foreach ($all_languages as $lang){
            $this->validate($request, [
                'home_page_infobar_section_'.$lang->slug.'_title' => 'nullable|string',
                'home_page_infobar_section_'.$lang->slug.'_url'=> 'nullable|string',
                'home_page_infobar_section_'.$lang->slug.'_details'=> 'nullable|string',
            ]);
            $fields = [
                'home_page_infobar_section_'.$lang->slug.'_title',
                'home_page_infobar_section_'.$lang->slug.'_url',
                'home_page_infobar_section_'.$lang->slug.'_details'
            ];
            foreach ($fields as $field){
                if($request->has($field)){
                        update_static_option($field,$request->$field);
                }
            }
        }
        return redirect()->back()->with([
            'msg' => __('Right Section Updated...'),
            'type' => 'success'
        ]);
    }
    public function store_right_icons(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'title' => 'required|string',
            'details' => 'required|string',
            'lang' => 'required|string'
        ]);
        InfobarRightIcons::create($request->all());
        return redirect()->back()->with([
            'msg' => __('New Item Added...'),
            'type' => 'success'
        ]);
    }
    public function update_right_icons(Request $request){
        $this->validate($request,[
            'icon' => 'required|string',
            'title' => 'required|string',
            'details' => 'required|string',
            'lang' => 'required|string'
        ]);
        InfobarRightIcons::find($request->id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'details' => $request->details,
            'lang' => $request->lang
        ]);
        return redirect()->back()->with([
            'msg' => __('Item Updated...'),
            'type' => 'success'
        ]);
    }
    public function delete_right_icons(Request $request,$id){
        InfobarRightIcons::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Item Deleted...'),
            'type' => 'danger'
        ]);
    }
    public function bulk_action_right_icons(Request $request){
        $all = InfobarRightIcons::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

}
