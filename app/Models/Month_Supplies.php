<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month_Supplies extends Model
{
        //protected $table = 'cliente';
  protected $table = 'month_passive_supply';

     protected $fillable = [

'month_passives_id','supply_id','total_price','amount'
    ];


    public function supply()
    {
        return $this->hasMany('App\Models\Supply');
    }


    

}
