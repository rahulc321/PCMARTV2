<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
 protected $table = 'training';

 	 
  public function getCountDta(){
  	return $this->hasMany('\App\Models\ScheduleSession','trainingId','id');
  }

}
