<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
        //protected $table = 'cliente';
  protected $table = 'customers';

     protected $fillable = [

'name',
  'phone',
  'email',
  'address','city','zip_code'
    ];

     public static function hasInvoice()
    {
$customers= \DB::table('customers')
            ->join('cars', 'customers.id', '=', 'cars.customer_id')->where('cars.is_done',1)->distinct('customers.id')
            ->select('customers.id', 'customers.name');
            
return $customers;
    }


public function name(){
  return $this->name;
}


public function address(){
  return $this->address. ', '.$this->city. ', IL '.$this->zip_code. '.';
}



}
