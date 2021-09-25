<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cust extends Model
{
 protected $table = 'arcust';

 public function getDeleteCount(){
 	return $this->hasMany('App\Models\Ictran','CUSTNO','Organization_Number');
 }

}
