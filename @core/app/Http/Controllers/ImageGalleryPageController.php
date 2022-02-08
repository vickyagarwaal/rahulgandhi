<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\ImageGallery;
use App\ImageGalleryCategory;
use App\Language;
use Illuminate\Http\Request;

class ImageGalleryPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $all_gallery_images = ImageGallery::all();
        $all_categories = ImageGalleryCategory::where(['status' => 'publish'])->get();
        return view('backend.image-gallery.image-gallery')->with(['all_gallery_images' => $all_gallery_images,'all_categories' => $all_categories]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'image' => 'required|string',
            'title' => 'nullable|string',
            'cat_id' => 'required|string',
        ]);
        ImageGallery::create([
            'image' => $request->image,
            'title' => $request->title,
            'cat_id' => $request->cat_id,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request){
        $this->validate($request,[
            'image' => 'required|string',
            'title' => 'nullable|string',
            'cat_id' => 'required|string',
        ]);
        ImageGallery::find($request->id)->update([
            'image' => $request->image,
            'title' => $request->title,
            'cat_id' => $request->cat_id,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete(Request $request,$id){
        ImageGallery::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function bulk_action(Request $request){
        ImageGallery::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_index(){
        $all_gallery_images = ImageGalleryCategory::all();
        return view('backend.image-gallery.image-gallery-category')->with(['all_gallery_images' => $all_gallery_images]);
    }
    public function category_store(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|string',
        ]);
        ImageGalleryCategory::create([
            'status' => $request->status,
            'title' => $request->title,
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function category_update(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'status' => 'required|string',
        ]);
        ImageGalleryCategory::where('id',$request->id)->update([
            'status' => $request->status,
            'title' => $request->title,
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function category_delete(Request $request,$id){
        ImageGalleryCategory::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }

    public function category_bulk_action(Request $request){
        ImageGalleryCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
    public function category_by_slug(Request $request)
    {
        $service_category = ImageGalleryCategory::where(['status' => 'publish'])->get();
        return response()->json($service_category);
    }

    public function page_settings(){
        return view('backend.image-gallery.image-gallery-page-settings');
    }

    public function update_page_settings(Request $request){
        $this->validate($request,[
           'site_image_gallery_post_items' => 'nullable|string',
           'site_image_gallery_title' => 'nullable|string',
           'site_image_gallery_description' => 'nullable|string',
           'site_image_gallery_bg_img' => 'nullable|string',
        ]);
        $all_fields  = [
            'site_image_gallery_post_items',
           'site_image_gallery_title',
           'site_image_gallery_description',
           'site_image_gallery_bg_img'
        ];
        foreach ($all_fields as $field){
            if($request->has($field)){
                update_static_option($field,$request->$field);
            }
            
        }
        return redirect()->back()->with(FlashMsg::settings_update());
    }
}
