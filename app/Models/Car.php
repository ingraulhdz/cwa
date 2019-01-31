<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Car extends Model
{
        //protected $table = 'cliente';

     protected $fillable = [
   'make',
  'model' ,
  'year',
  'vin',
  'note',
  'color',
  'stock',
  'level',
  'price',
  'is-donde',
  'is_invoice',
  'is_paid',
  'status',
  'dealer_id',
  'body_style_id',    
  'customer_id',
   'employee_id',
'service_id',
'payment_id',
'user_id',
'price_plus',
'created_at',
'updated_at'
    ];



public function scopeCar($query, $car){
  if($car != ""){
  $query->where('make', 'like','%'. $car.'%')->orWhere('model', 'like','%'. $car.'%')->orWhere('vin',$car)->orWhere('year',$car);
 
}
}


public function name(){
  
  return $this->year.' '.$this->make.'-'.$this->model. ' #'. $this->vin;
}




public function inShop(){
  

  return  $this->where('level',0)->get();


}



public function ready(){
  


  return  $this->where('level',1)->get();
  

}



public function done(){
  


  return  $this->where('level',2)->get();
  

}



public function invoice(){
  


  return  $this->where('level',3)->get();


}


 




public function paid(){
  


  return  $this->where('level',4)->get();




  return $cars;

}























  public function ex()
    {
        return $this->belongsToMany('App\Models\Extra');
    }



  public function totalExtras()
    {
      $suma=0;
      $suma = $this->ex()->sum('price');

        return $suma;
    }




 public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }


  public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }



  public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }



  public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }



  public function body_style()
    {
        return $this->belongsTo('App\Models\BodyStyle');
    }




        public function getPriceByStyle($id){
        return Body::where('id',$id)->first()->cost;
    }  


     public function getDealer(){
        return Dealer::where('id',$this->dealer_id)->first();
    }

   

    public function getDetailer(){
        return User::where('id',$this->detailer_id)->first();
    }

  public function getCustomer(){
        return Customer::where('id',$this->customer_id)->first();
    }

 

      public function getCost(){
        return Service::where('id',$this->service_id)->first()->cost;
    }

      public function getExtra(){
        return Extra::where('id',$this->extras)->first();
    }

   


}
