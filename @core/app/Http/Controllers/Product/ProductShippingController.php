<?php

namespace App\Http\Controllers\Product;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;

use App\Language;
use App\ProductShipping;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class ProductShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function all_shipping(){
        $all_shipping = ProductShipping::all();
        return view('backend.products.shipping.all-shipping')->with(['all_shipping' => $all_shipping]);
    }
    public function store_all_shipping(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191:unique:product_shippings',
            'status' => 'required|string|max:191',
            'description' => 'nullable|string',
            'cost' => 'nullable|string',
            'order' => 'nullable|string',
        ]);
        ProductShipping::create([
            'title' => Purifier::clean($request->title),
            'status' =>  $request->status,
            'description' =>  Purifier::clean($request->description),
            'cost' =>  $request->cost,
            'order' =>  $request->order,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update_shipping(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:191:unique:product_shippings',
            'status' => 'required|string|max:191',
            'description' => 'nullable|string',
            'cost' => 'nullable|string',
            'order' => 'nullable|string',
        ]);
        ProductShipping::find($request->id)->update([
            'title' => Purifier::clean($request->title),
            'status' =>  $request->status,
            'description' =>  Purifier::clean($request->description),
            'cost' =>  $request->cost,
            'order' =>  $request->order,
            ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete_shipping(Request $request,$id){
        ProductShipping::find($request->id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function default_shipping($id){
        $shipping = ProductShipping::find($id);
        ProductShipping::where(['is_default' => '1'])->update(['is_default' => '0']);
        $shipping->is_default = '1';
        $shipping->save();
        return redirect()->back()->with([
            'msg' => __('Default Shipping Set To').' '.Purifier::clean($shipping->title),
            'type' => 'success'
        ]);
    }
    public function bulk_action(Request $request){
        $all = ProductShipping::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
