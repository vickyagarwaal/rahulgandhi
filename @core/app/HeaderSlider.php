<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSlider extends Model
{
    use HasFactory;
    protected $fillable = ['title','subtitle','btn_txt','btn_url','btn_status','vdo_btn_txt','vdo_btn_url','vdo_btn_status','image'];
}
