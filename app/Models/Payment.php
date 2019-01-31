<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
        //protected $table = 'cliente';
  protected $table = 'payments';

     protected $fillable = [

'name',
  'description'
    ];
}
