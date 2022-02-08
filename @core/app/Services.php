<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','title','slug','excerpt','description','icon','icon_type','sr_order','img_icon','image','status','meta_title','meta_description','meta_tags','og_meta_title','og_meta_description','og_meta_image'];

    public function category(){
        return $this->belongsTo(ServiceCategory::class,'category_id');
    }
}
