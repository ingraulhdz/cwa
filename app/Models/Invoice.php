<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
        //protected $table = 'cliente';
  protected $table = 'invoices';

     protected $fillable = [

'id',
'dealer_id',
  'is_paid',
  'due_by','note','due','customer_id','send_times'
    ];

  

public function customerName(){
  if($this->dealer){
    return $this->dealer;

  }
  else{
    return $this->customer;
  }
}


  
public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }

  
public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }




public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }





  public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }


    public function due(){

      return $this->where('is_paid',0)->get();
    }


    

}
