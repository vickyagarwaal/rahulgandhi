<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['categories_id','booking_time_ids','title','designation','location','short_description','description','additional_info','experience_info','specialized_info','booking_info','status','appointment_status','image','max_appointment','price','meta_description','meta_title','meta_tags','og_meta_description','og_meta_title','og_meta_image','user_id','created_by','slug'];
    public function setAppointmentStatusAttribute($value){
        $this->attributes['appointment_status'] = !empty($value) ? 'yes' : 'no';
    }
    public function category(){
        return $this->belongsTo(AppointmentCategory::class,'categories_id');
    }
    public function getBookingTimeIdsAttribute($value){
        $all_booking_time = AppointmentBookingTime::whereIn('id',explode(',',$value))->get();
        $all_times = $all_booking_time->map(function ($item){
            return ['id' => $item->id, 'time' => $item->time];
        })->toArray();
        return $all_times;
    }
    public function reviews(){
        return $this->hasMany(AppointmentReview::class,'appointment_id','id');
    }
   
    public function setAdditionalInfoAttribute($value){
        $final_value = $value ?? [];
       $this->attributes['additional_info'] = serialize($final_value);
    }
    public function setExperienceInfoAttribute($value){
        $final_value = $value ?? [];
        $this->attributes['experience_info'] = serialize($final_value);
    }
    public function setSpecializedInfoAttribute($value){
        $final_value = $value ?? [];
        $this->attributes['specialized_info'] = serialize($final_value);
    }
    public function setBookingInfoAttribute($value){
        $final_value = $value ?? [];
        $this->attributes['booking_info'] = serialize($final_value);
    }
    public function getAdditionalInfoAttribute($value){
        return unserialize($value,['class' => false]);
    }
    public function getExperienceInfoAttribute($value){
        return unserialize($value,['class' => false]);
    }
    public function getSpecializedInfoAttribute($value){
        return unserialize($value,['class' => false]);
    }
    public function getBookingInfoAttribute($value){
        return unserialize($value,['class' => false]);
    }
    
}
