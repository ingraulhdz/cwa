<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        //protected $table = 'cliente';
  protected $table = 'services';

     protected $fillable = [

'name',
  'description',
  'body_style_id',
  'price'
    ];


     public function body_style()
    {
        return $this->belongsTo('App\Models\BodyStyle');
    }


    
}
