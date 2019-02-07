<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthPassive extends Model
{
        //protected $table = 'cliente';
  protected $table = 'month_passives';

     protected $fillable = [

'month','month_name','cost'
    ];


  public function supplies()
    {
        return $this->belongsToMany('App\Models\Supply');
    }



    public function expenses(){

        return $this->hasMany('App\Models\Expense');
    }

 /*    public function supplies()
    {
        return $this->hasMany('App\Models\Supply');
    }*/


}
