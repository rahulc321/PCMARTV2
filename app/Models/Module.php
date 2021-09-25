<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
 protected $table = 'module';

 	 
 public function getAllModuel(){
 	return $this->hasMany('App\Models\ModuleAccess','module_id','id');
 }

}
