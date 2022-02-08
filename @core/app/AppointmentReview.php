<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentReview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','ratings','appointment_id','message'];
    public function appointment(){
        return $this->hasOne(Appointment::class,'id','appointment_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
