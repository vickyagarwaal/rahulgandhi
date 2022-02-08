<?php

namespace App\Http\Controllers\Product;

use App\Helpers\FlashMsg;
use App\Http\Controllers\Controller;

use App\ProductCategory;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function all_product_category(){
        $all_category = ProductCategory::all();
        return view('backend.products.all-products-category')->with(['all_category' => $all_category]);
    }

    public function store_product_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'category_level' => 'required|string',
            'status' => 'required|string',
            'icon' => 'nullable|string',
        ]);
        if($request->category_level == 'main'){
            $parent_id = '0';
        }else{
            $parent_id = $request->parent_id;
        }
        ProductCategory::create([
            'name' => $request->name,
            'parent_id' => $parent_id,
            'status' => $request->status,
            'icon' => $request->icon,
        ]);
        return back()->with(FlashMsg::item_new());
    }
    public function update_product_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'parent_id' => 'required|string',
            'status' => 'required|string',
            'icon' => 'nullable|string',
        ]);
        ProductCategory::find($request->id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'icon' => $request->icon,
        ]);
        return back()->with(FlashMsg::item_update());
    }
    public function delete_product_category($id){
        if (Products::where('category_id',$id)->first() || Products::where('sub_category_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Products...'),
                'type' => 'danger'
            ]);
        }
        if (ProductCategory::where('parent_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With Category...'),
                'type' => 'danger'
            ]);
        }
        ProductCategory::find($id)->delete();
        return back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ProductCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function category_info(Request $request){
        $all_parent_category = ProductCategory::where('parent_id','0')->get();
        return response()->json([
            'view'=>(String)FacadesView::make('backend.products.components.parent-category')->with([
                'all_parent_category'=> $all_parent_category,
                'level'=> $request->category_level,
            ])
        ]);
    }
    
}
