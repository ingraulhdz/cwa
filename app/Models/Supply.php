<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
        //protected $table = 'cliente';
  protected $table = 'supplies';

     protected $fillable = [

'name','price','description'
    ];


    public function monthlyExpenses()
    {
        return $this->belongsToMany('App\Models\monthlyExpenses');
    }

}
