<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentBookingTime extends Model
{
    use HasFactory;
    protected $fillable = ['time','status'];
}
