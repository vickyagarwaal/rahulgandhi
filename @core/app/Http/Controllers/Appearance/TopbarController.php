<?php


namespace App\Http\Controllers\Appearance;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;

use App\Language;
use App\SocialIcon;
use App\TopbarInfo;
use Illuminate\Http\Request;

class TopbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_topbar_infos = TopbarInfo::all();
        $all_social_icons = SocialIcon::all();
        return view('backend.appearance.top-bar-area-settings')->with([
            'all_topbar_infos' => $all_topbar_infos,
            'all_social_icons' => $all_social_icons,
        ]);
    }
    public function store_topbar_info(Request $request){
        $this->validate($request,[
           'icon' => 'required|string',
           'details' => 'required|string',
        ]);
        TopbarInfo::create($request->all());
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update_topbar_info(Request $request){
        $this->validate($request,[
           'icon' => 'required|string',
           'details' => 'required|string',
        ]);

        TopbarInfo::find($request->id)->update([
            'icon' => $request->icon,
            'details' => $request->details,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete_topbar_info(Request $request,$id){
        TopbarInfo::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action_topbar_info(Request $request){
        $all = TopbarInfo::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
    public function store_social_icon(Request $request){
        $this->validate($request,[
           'social_item_icon' => 'required|string',
           'url' => 'required|string',
        ]);
        SocialIcon::create([
            'icon' => $request->social_item_icon,
            'url' => $request->url,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update_social_icon(Request $request){
        $this->validate($request,[
           'social_item_icon' => 'required|string',
           'url' => 'required|string',
        ]);
        SocialIcon::find($request->id)->update([
            'icon' => $request->social_item_icon,
            'url' => $request->url,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function topbar_variant(Request $request){
        $this->validate($request,[
           'topbar_variant_home_'.home_variant() => 'nullable|string',
           'topbar_btn_txt' => 'nullable|string',
           'topbar_btn_url' => 'nullable|string',
           'topbar_btn_icon' => 'nullable|string',
           'topbar_btn_open_external' => 'nullable|string',
        ]);
        if(get_static_option('topbar_variant') == '01'){
            $fields = [
                'topbar_btn_txt',
                'topbar_btn_url',
                'topbar_btn_icon',
                'topbar_btn_open_external'
            ];
            foreach ($fields as $field) {
                update_static_option($field, $request->$field);
            }
        }
        $fields = [
            'topbar_variant_home_'.home_variant(),
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
    public function delete_social_icon($id){
        SocialIcon::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

}
