<?php

namespace App\Http\Controllers;

use App\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_why_choose_us = WhyChooseUs::all()->groupBy('lang');
        return view('backend.pages.why-choose-us-section')->with([
            'all_why_choose_us' => $all_why_choose_us
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'icon' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'lang' => 'required|string',
        ]);
        WhyChooseUs::create($request->all());
        return redirect()->back()->with(['msg' => __('Item Added...'),'type' => 'success']);
    }
    public function update(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191',
            'subtitle' => 'nullable|string|max:191',
            'icon' => 'required|string|max:191',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'lang' => 'required|string',
        ]);
        WhyChooseUs::find($request->id)->update($request->all());
        return redirect()->back()->with(['msg' => __('Item Updated...'),'type' => 'success']);
    }
    public function delete($id){
        WhyChooseUs::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Delete Success...'),'type' => 'danger']);
    }
    public function bulk_action(Request $request){
        $all = WhyChooseUs::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
