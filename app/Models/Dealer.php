<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
        //protected $table = 'cliente';
  protected $table = 'dealers';

     protected $fillable = [

'name',
  'phone',
  'email',
  'manager',
  'address',
  'city',
  'state',
  'country',
  'zip_code',
  'contact',
  'contact_phone',

    ];



    public function logo(){
  
      if($this->photo){
      
        return $this->photo;
      
      }else {

        return 'logo';
          }

                    }




    public function address(){
      return $this->address.', '.$this->city.', Il, US '.$this->zip_code.'.' ;
    }

 
  public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }


 public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }


 public static function hasInvoice()
    {
$dealers= \DB::table('dealers')
            ->join('cars', 'dealers.id', '=', 'cars.dealer_id')->where('cars.level',1)->orWhere('cars.level',2)->distinct('dealers.id')
            ->select('dealers.id', 'dealers.name');
            
return $dealers;
    }






}
