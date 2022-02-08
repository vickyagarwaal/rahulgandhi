<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentCategory extends Model
{
    use HasFactory;
    protected $fillable = ['status','name'];
}
