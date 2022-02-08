<?php

namespace App\Http\Controllers;

use App\HeaderBottom;
use App\Helpers\FlashMsg;
use Illuminate\Http\Request;

class HeaderBottomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_header_bottom_items = HeaderBottom::where('home_variant',get_static_option('home_page_variant'))->get();
        return view('backend.pages.home-page-manage.header-bottom-area')->with(['all_header_bottom_items' => $all_header_bottom_items]);
    }
    public function store(Request $request){
        $home_variant = get_static_option('home_page_variant');
        if($home_variant == '01'){
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'icon' => 'required|string|max:191',
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'subtitle' => 'required|string|max:191',
                'offer_title' => 'required|string|max:191',
                'offer_price' => 'required|string|max:191',
                'url' => 'required|string|max:191',
                'image' => 'required|string|max:191',
            ]);
        }
        HeaderBottom::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'offer_title' => $request->offer_title,
            'offer_price' => $request->offer_price,
            'url' => $request->url,
            'image' => $request->image,
            'icon' => $request->icon,
            'home_variant' => $home_variant
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request){
        $home_variant = get_static_option('home_page_variant');
        if($home_variant == '01'){
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'icon' => 'required|string|max:191',
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'subtitle' => 'required|string|max:191',
                'offer_title' => 'required|string|max:191',
                'offer_price' => 'required|string|max:191',
                'url' => 'required|string|max:191',
                'image' => 'required|string|max:191',
            ]);
        }
        HeaderBottom::find($request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'offer_title' => $request->offer_title,
            'offer_price' => $request->offer_price,
            'url' => $request->url,
            'image' => $request->image,
            'icon' => $request->icon,
            'home_variant' => $home_variant
        ]);
        return redirect()->back()->with(FlashMsg::item_update());    
    }

    public function delete($id)
    {
        HeaderBottom::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());    
    }
    public function bulk_action(Request $request){
        HeaderBottom::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
