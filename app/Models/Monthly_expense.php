<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monthly_expense extends Model
{
        //protected $table = 'cliente';
  protected $table = 'monthly_expenses';

     protected $fillable = [

'month','month_name','cost'
    ];



    public function expenses(){

        return $this->hasMany('App\Models\Expense');
    }
}
