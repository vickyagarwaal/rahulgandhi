<?php

namespace App\Http\Controllers\Appearance;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;
use App\PopupBuilder;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function new_popup()
    {
        return view('backend.appearance.popup.popup-new');
    }
    public function store_popup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'title' => 'nullable|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'offer_time_end' => 'nullable|string',
            'btn_status' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'background_image' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        PopupBuilder::create([
            'name' => $request->name,
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'offer_time_end' => $request->offer_time_end,
            'btn_status' => $request->btn_status,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'background_image' => $request->background_image,
            'only_image' => $request->image,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function all_popup()
    {
        $all_popup = PopupBuilder::all();
        return view('backend.appearance.popup.popup-all')->with(['all_popup' => $all_popup]);
    }
    public function delete_popup(Request $request, $id)
    {
        PopupBuilder::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function edit_popup($id)
    {
        $popup = PopupBuilder::find($id);
        return view('backend.appearance.popup.popup-edit')->with(['popup' => $popup]);
    }
    public function update_popup(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'title' => 'nullable|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'offer_time_end' => 'nullable|string',
            'btn_status' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|string',
            'background_image' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        PopupBuilder::find($id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'offer_time_end' => $request->offer_time_end,
            'btn_status' => $request->btn_status,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'background_image' => $request->background_image,
            'only_image' => $request->image,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function clone_popup(Request $request, $id)
    {
        $popup_details = PopupBuilder::find($id);
        PopupBuilder::create([
            'lang' => $popup_details->lang,
            'name' => $popup_details->name,
            'title' => $popup_details->title,
            'type' => $popup_details->type,
            'description' => $popup_details->description,
            'offer_time_end' => $popup_details->offer_time_end,
            'btn_status' => $popup_details->btn_status,
            'button_text' => $popup_details->button_text,
            'button_link' => $popup_details->button_link,
            'background_image' => $popup_details->background_image,
            'only_image' => $popup_details->only_image,
        ]);
        return redirect()->back()->with(['msg' => __('Item Cloned Successfully'), 'type' => 'success']);
    }
    public function bulk_action(Request $request){
        PopupBuilder::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
