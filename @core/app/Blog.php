<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','user_id','title','slug','tags','author','content','meta_title','meta_tags','meta_description','og_meta_title','og_meta_description','og_meta_image','image','status'];
    public function category(){
        return $this->belongsTo('App\BlogCategory','category_id');
    }
    public function user(){
        return $this->belongsTo('App\Admin','user_id');
    }
}