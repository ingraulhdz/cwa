<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
        //protected $table = 'cliente';
  protected $table = 'services';

     protected $fillable = [

'name',
  'description',
    ];


     public function body_style()
    {
        return $this->belongsTo('App\Models\BodyStyle');
    }


    
}
