<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\Language;
use App\PricePlan;
use App\ServiceCategory;
use App\ServiceCategoryLang;
use App\Services;
use App\ServicesLang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_services = Services::get();
        $service_category = ServiceCategory::where('status','publish')->get();
        return view('backend.pages.service.index')->with(['all_services' => $all_services, 'service_category' => $service_category]);
    }
    public function new_service()
    {
        $service_category = ServiceCategory::where('status','publish')->get();
        return view('backend.pages.service.new-service')->with(['service_category' => $service_category]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'icon_type' => 'required|string',
            'img_icon' => 'nullable|string|max:191',
            'sr_order' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'meta_description'=>'nullable',
            'meta_title'=>  'nullable',
            'meta_tags'=>  'nullable',
            'og_meta_description'=>  'nullable',
            'og_meta_title'=>  'nullable',
            'og_meta_image'=>  'nullable',
            'slug' => 'nullable',
            'image' => 'nullable|string',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'category_id' => 'required|string',
        ]);
        Services::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'excerpt'=> $request->excerpt,
            'slug'=> $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'meta_title'=> $request->meta_title,
            'og_meta_title'=> $request->og_meta_title,
            'meta_description'=> $request->meta_description,
            'og_meta_description'=> $request->og_meta_description,
            'meta_tags'=> $request->meta_tags,
            'og_meta_image'=> $request->og_meta_image,
            'category_id'=> $request->category_id,
            'icon_type'=> $request->icon_type,
            'icon'=> $request->icon,
            'img_icon'=> $request->img_icon,
            'sr_order'=> $request->sr_order,
            'image'=> $request->image,
            'status'=> $request->status
        ]);
        return back()->with(FlashMsg::item_new());
    }
    public function edit_service($id)
    {
        $service = Services::find($id);
        $service_category = ServiceCategory::where('status','publish')->get();
        return view('backend.pages.service.edit-service')->with(['service_category' => $service_category,'service' => $service]);
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'icon_type' => 'required|string',
            'img_icon' => 'nullable|string|max:191',
            'sr_order' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'meta_description'=>'nullable',
            'meta_title'=>  'nullable',
            'meta_tags'=>  'nullable',
            'og_meta_description'=>  'nullable',
            'og_meta_title'=>  'nullable',
            'og_meta_image'=>  'nullable',
            'slug' => 'nullable',
            'image' => 'nullable|string',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'category_id' => 'required|string'
        ]);
        Services::find($request->id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'excerpt'=> $request->excerpt,
            'slug'=> $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'meta_title'=> $request->meta_title,
            'og_meta_title'=> $request->og_meta_title,
            'meta_description'=> $request->meta_description,
            'og_meta_description'=> $request->og_meta_description,
            'meta_tags'=> $request->meta_tags,
            'og_meta_image'=> $request->og_meta_image,
            'category_id'=> $request->category_id,
            'icon_type'=> $request->icon_type,
            'icon'=> $request->icon,
            'img_icon'=> $request->img_icon,
            'sr_order'=> $request->sr_order,
            'image'=> $request->image,
            'status'=> $request->status
        ]); 


        return back()->with(FlashMsg::item_update());
    }
    public function delete($id)
    {
        Services::where('id',$id)->delete();
        return back()->with(FlashMsg::item_delete());
    }
    public function category_index()
    {
        $all_category = ServiceCategory::get();
        return view('backend.pages.service.category')->with(['all_category'=>$all_category]);
    }
    public function category_store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'icon' => 'nullable',
            'status' => 'required|string',
        ]);
        ServiceCategory::create([
            'name'=>$request->name,
            'status' => $request->status,
            'icon'=>$request->icon,
        ]);
        return back()->with(FlashMsg::item_new());
    }
    public function category_update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'icon' => 'nullable',
            'status' => 'required|string',
        ]);
        ServiceCategory::find($request->id)->update([
            'name'=>$request->name,
            'status' => $request->status,
            'icon'=>$request->icon,
        ]);
        return back()->with(FlashMsg::item_update());
    }
    public function category_delete(Request $request, $id)
    {
        if (Services::where('category_id', $id)->first()) {
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Category, It Already Associated With A Service...'),
                'type' => 'danger'
            ]);
        }
        ServiceCategory::where('id',$id)->delete();
        return back()->with(FlashMsg::item_delete());
    }
    public function category_by_slug(Request $request)
    {
        $service_category = ServiceCategory::where(['status' => 'publish'])->get();
        return response()->json($service_category);
    }
    public function bulk_action(Request $request)
    {
        Services::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function category_bulk_action(Request $request)
    {
        ServiceCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function clone_service_as_draft(Request $request){
        $service_details = Services::find($request->id);
        $new_slug = !empty($service_details->slug) ? Str::slug($service_details->slug) : Str::slug($service_details->title);
        $check_slug = Services::where('slug',$new_slug)->get();
        if (count($check_slug) > 0){
            $new_slug .= count($check_slug) + 1;
        }
        Services::create([
            'title'=> $service_details->title,
            'description'=> $service_details->description,
            'excerpt'=> $service_details->excerpt,
            'slug'=> $service_details->slug,
            'meta_title'=> $service_details->meta_title,
            'og_meta_title'=> $service_details->og_meta_title,
            'meta_description'=> $service_details->meta_description,
            'og_meta_description'=> $service_details->og_meta_description,
            'meta_tags'=> $service_details->meta_tags,
            'og_meta_image'=> $service_details->og_meta_image,
            'category_id'=> $service_details->category_id,
            'icon_type'=> $service_details->icon_type,
            'icon'=> $service_details->icon,
            'img_icon'=> $service_details->img_icon,
            'sr_order'=> $service_details->sr_order,
            'image'=> $service_details->image,
            'status'=> 'draft',
        ]);
        return redirect()->back()->with(FlashMsg::item_clone());
    }
}
