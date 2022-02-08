<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyfeature extends Model
{
    use HasFactory;
    protected $fillable = ['title','icon','description','variant'];
}
