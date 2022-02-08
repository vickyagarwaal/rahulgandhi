<?php

namespace App\Http\Controllers;

use App\Counterup;
use App\Helpers\FlashMsg;
use App\Language;
use Illuminate\Http\Request;

class CounterUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_counterups  = Counterup::all();
        return view('backend.pages.counterup-section')->with([
            'all_counterups' => $all_counterups,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'number' => 'required|string|max:191',
            'extra_text' => 'nullable|string|max:191',
            'icon' => 'nullable|string|max:191',
        ]);
        Counterup::create([
            'title' => $request->title,
            'number' => $request->number,
            'extra_text' => $request->extra_text,
            'icon' => $request->icon,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'number' => 'required|string|max:191',
            'extra_text' => 'nullable|string|max:191',
            'icon' => 'nullable|string|max:191',
        ]);
        Counterup::find($request->id)->update([
            'title' => $request->title,
            'number' => $request->number,
            'extra_text' => $request->extra_text,
            'icon' => $request->icon
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete($id)
    {
        Counterup::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action(Request $request)
    {
        Counterup::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
