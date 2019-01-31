<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
        //protected $table = 'cliente';
  protected $table = 'extras';

     protected $fillable = [

'name','price','description'
    ];
}
