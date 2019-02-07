<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniqueExpense extends Model
{
        //protected $table = 'cliente';
  protected $table = 'unique_expenses';

     protected $fillable = [

'name','price','description', 'month_id'
    ];


  
}
