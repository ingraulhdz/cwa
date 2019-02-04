<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
        //protected $table = 'cliente';
  protected $table = 'monthly_expenses';

     protected $fillable = [

'month','month_name','cost'
    ];
}
