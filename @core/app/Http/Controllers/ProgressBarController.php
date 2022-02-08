<?php

namespace App\Http\Controllers;

use App\Helpers\FlashMsg;
use App\ProgressBar;
use Illuminate\Http\Request;

class ProgressBarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function store(Request $request){
        $this->validate($request,[
           'title' => 'required|string',
           'progress' => 'required|string'
        ]);
        ProgressBar::create([
            'title' => $request->title,
            'progress' => $request->progress
        ]);
        return redirect()->back()->with(FlashMsg::item_new());
    }
    public function update(Request $request){
        $this->validate($request,[
           'title' => 'required|string',
           'progress' => 'required|string'
        ]);
        ProgressBar::find($request->id)->update([
            'title' => $request->title,
            'progress' => $request->progress
        ]);
        return redirect()->back()->with(FlashMsg::item_update());
    }
    public function delete($id){
        ProgressBar::find($id)->delete();
        return redirect()->back()->with(FlashMsg::item_delete());
    }
    public function bulk_action(Request $request){
        ProgressBar::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}
