<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','icon','parent_id','status'];

    public function subcategory(){
        return $this->hasMany(ProductCategory::class,'parent_id')->where(['status'=>'publish']);
    }
}
