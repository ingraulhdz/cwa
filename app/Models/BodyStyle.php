<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyStyle extends Model
{
  protected $table = 'body_style';

     protected $fillable = [

'name','description'
    ];
}
