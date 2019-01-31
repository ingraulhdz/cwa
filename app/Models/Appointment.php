<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
        //protected $table = 'cliente';
  protected $table = 'appointments';

     protected $fillable = [

'id', 'make', 'model', 'year','in_shop','is_confirmed', 'customer_id', 'date','time', 'date_pickup', 'created_at', 'updated_at', 'message', 'service_id', 'body_id', 'address_pickup', 'city_pickup', 'zip_code_pickup', 'address_delivery', 'city_delivery', 'zip_code_delivery'
    ];



    public function getCustomer(){

        return Customer::where('id',$this->customer_id)->first();
 


    }
}





