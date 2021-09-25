<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ictran extends Model
{
 protected $table = 'ictran';

 public function getCountInvoice(){
 	return $this->hasMany('App\Models\Ticket','ictran_id','id')->where('status',2);
 	//return $this->hasMany('App\Models\Ticket','invoice_no','Contract_Number')->where('status',2);
 }
}
