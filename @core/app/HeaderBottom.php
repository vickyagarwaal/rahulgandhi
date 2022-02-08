<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderBottom extends Model
{
    use HasFactory;
    protected $fillable = ['title','subtitle','offer_title','offer_price','url','icon','image','home_variant'];
}
