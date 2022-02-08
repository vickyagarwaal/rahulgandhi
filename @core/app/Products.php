<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','sub_category_id','title','short_description','description','attributes_title','attributes_description','badge','slug','sku','stock_status','total_sold','image','gallery','is_downloadable','downloadable_file','regular_price','sale_price','sales','tax_percentage','is_featured','status','meta_description','meta_title','meta_tags','og_meta_description','og_meta_title','og_meta_image'];
    public function category(){
        return $this->hasOne('App\ProductCategory','id','category_id');
    }
    public function subcategory(){
        return $this->hasOne('App\ProductCategory','id','sub_category_id');
    }
    public function ratings(){
        return $this->hasMany('App\ProductRatings','product_id','id');
    }

}
