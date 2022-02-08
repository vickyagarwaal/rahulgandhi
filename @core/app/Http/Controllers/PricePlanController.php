<?php

namespace App\Http\Controllers;

use App\Language;
use App\PricePlan;
use Illuminate\Http\Request;

class PricePlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_price_plan = PricePlan::all()->groupBy('lang');
        return view('backend.pages.price-plan')->with([
            'all_price_plan' => $all_price_plan
             ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'price' => 'required|string|max:191',
            'type' => 'required|string|max:191',
            'btn_text' => 'required|string|max:191',
            'btn_url' => 'nullable|string|max:191',
            'features' => 'required|string',
            'lang' => 'required|string',
            'image' => 'required|string'
        ]);
        PricePlan::create($request->all());
        return redirect()->back()->with(['msg' => __('Item Added Successfully...'), 'type' => 'success']);
    }

    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'price' => 'required|string|max:191',
            'type' => 'required|string|max:191',
            'btn_text' => 'required|string|max:191',
            'btn_url' => 'nullable|string|max:191',
            'features' => 'required|string',
            'lang' => 'required|string',
            'image' => 'required|string'
        ]);
        PricePlan::find($request->id)->update($request->all());
        return redirect()->back()->with(['msg' => __('Item Updated Successfully...'), 'type' => 'success']);
    }
    public function delete($id){
        PricePlan::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Item Deleted Successfully...'), 'type' => 'danger']);
    }
    public function bulk_action(Request $request){
        $all = PricePlan::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
