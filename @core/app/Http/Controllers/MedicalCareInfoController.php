<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\MedicalCareInfo;
use Illuminate\Http\Request;

class MedicalCareInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_medical_care_items = MedicalCareInfo::where('type','medical_care')->get();
        $all_opening_hour_items = MedicalCareInfo::where('type','opening_hour')->get();
        return view('backend.pages.medical-care-info')->with(['all_medical_care_items'=>$all_medical_care_items,'all_opening_hour_items'=>$all_opening_hour_items]);
    }
    public function store(Request $request){
        $type = $request->type;
        if($type == 'medical_care'){
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'icon' => 'required|string|max:191',
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'details' => 'required|string|max:191',
            ]);
        }
        MedicalCareInfo::create([
            'title' => $request->title,
            'details' => $request->details,
            'icon' => $request->icon,
            'type' => $type
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request){
        $type = $request->type;
        if($type == 'medical_care'){
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'icon' => 'required|string|max:191',
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required|string|max:191',
                'details' => 'required|string|max:191',
            ]);
        }
        MedicalCareInfo::find($request->id)->update([
            'title' => $request->title,
            'details' => $request->details,
            'icon' => $request->icon,
            'type' => $type
        ]);
        return redirect()->back()->with(FlashMsg::item_update());    
    }

    public function delete($id)
    {
        MedicalCareInfo::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());    
    }
    public function bulk_action(Request $request){
        MedicalCareInfo::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
