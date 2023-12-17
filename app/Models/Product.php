<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 protected $table = 'product';

 	 
 // public function getAllModuel(){
 // 	return $this->hasMany('App\Models\ModuleAccess','module_id','id');
 // }


 public function supportPrice(){
 	return $this->hasMany('App\Models\Info','id','company_name');
 }

}
