<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infobar extends Model
{
    use HasFactory;
    protected $fillable = ['title','icon','details'];
}
