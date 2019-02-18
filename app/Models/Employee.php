<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
        //protected $table = 'cliente';
  protected $table = 'employees';

     protected $fillable = [

'name','last_name','email', 'phone','rol_id','address','city','country','zip_code','status' ,'photo'

    ];


public function fullName(){
	
	return $this->name.' '.$this->last_name;
}



public function img(){
	
	if($this->photo){
		return $this->photo;
}else {

return '/img/employees/avatar.jpg';
}

}


 public function user()
    {
        return $this->hasOne('App\User');
    }


public function rol(){

	return $this->belongsTo('App\Models\Rol');
}


 


public function getPhoto(){

	if($this->photo){
		return 'img/'.$this->photo;

}

	return 'img/avatar04.png';
}




}
