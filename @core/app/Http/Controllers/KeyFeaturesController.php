<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Keyfeature;
use App\Language;
use Illuminate\Http\Request;

class KeyfeaturesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $home_variant = get_static_option('home_page_variant');
        $variant = (in_array($home_variant, ['01','02']))? 'one' : 'two';
        $all_key_features = Keyfeature::where('variant',$variant)->get();
        return view('backend.pages.key-features')->with([
            'all_key_features' => $all_key_features
        ]);
    }
    public function store(Request $request)
    {
        $home_variant = get_static_option('home_page_variant');
        $variant = (in_array($home_variant, ['01','02']))? 'one' : 'two';
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
            'description' => 'required|string',
        ]);
        Keyfeature::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
            'variant' => $variant,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
            'description' => 'required|string',
        ]);
        Keyfeature::find($request->id)->update($request->all());
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete($id)
    {
        Keyfeature::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action(Request $request)
    {
        Keyfeature::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
