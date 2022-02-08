<?php

namespace App\Http\Controllers\Appointment\Backend;

use App\Http\Controllers\Controller;
use App\AppointmentCategory;
use App\Helpers\FlashMsg;
use Illuminate\Http\Request;

class AppointmentCategoryController extends Controller
{
    public function category_all(){
         $all_categories = AppointmentCategory::all();
         return view('backend.appointment.appointment-category')->with(['all_category' => $all_categories]);
    }
    public function category_new(Request $request){
        $this->validate($request,[
            'status' => 'required|string',
            'name' => 'required|string',
        ]);
        AppointmentCategory::create([
            'name' =>  $request->name ?? '',
            'status' => $request->status,
        ]);
        return back()->with(FlashMsg::item_new());
    }

    public function category_delete(Request $request,$id){
        AppointmentCategory::where('id',$id)->delete();
        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        AppointmentCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_update(Request $request){
        $this->validate($request,[
            'status' => 'required|string',
            'name' => 'required|string',
        ]);
        AppointmentCategory::find($request->id)->update([
            'name' =>  $request->name ?? '',
            'status' => $request->status,
        ]);
        return back()->with(FlashMsg::item_update());
    }


}
