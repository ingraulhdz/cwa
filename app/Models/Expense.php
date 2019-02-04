<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
        //protected $table = 'cliente';
  protected $table = 'expenses';

     protected $fillable = [

'name','price','description', 'status','is_monthly'
    ];
}
