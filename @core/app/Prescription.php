<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id','appointment_id','product_order_id','customer_message','customer_prescription','admin_feedback_message','status' ,'name','email','phone'];

    public function appointment(){
        return $this->hasOne(Appointment::class,'id','appointment_id');
    }
    public function order(){
        return $this->hasOne(ProductOrder::class,'id','product_order_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    
}
