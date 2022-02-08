<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    use HasFactory;
    protected $fillable = ['status','payment_status','transaction_id','payment_track','payment_gateway','user_id','appointment_id','total','name','email','booking_date','booking_time_id','custom_fields','all_attachment',
    'boooked_by'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function booking_time(){
        return $this->belongsTo(AppointmentBookingTime::class,'booking_time_id');
    }
    public function appointment(){
        return $this->hasOne(Appointment::class,'id','appointment_id');
    }
    public function setCustomFieldsAttribute($value){
        $final_value = $value ?? [];
        $this->attributes['custom_fields'] = serialize($final_value);
    }
    public function getCustomFieldsAttribute($value){
        return unserialize($value,['class' => false]);
    }
    public function setAllAttachmentAttribute($value){
        $final_value = $value ?? [];
        $this->attributes['all_attachment'] = serialize($final_value);
    }
    public function getAllAttachmentAttribute($value){
        return unserialize($value,['class' => false]);
    }
    public function getExtraServicesInfoAttribute($value){
        return unserialize($value,['class' => false]);
    }
}
