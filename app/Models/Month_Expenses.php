<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month_Expenses extends Model
{
        //protected $table = 'cliente';
  protected $table = 'month_passive_expense';

     protected $fillable = [

'month_id','expense_id'
    ];
}
