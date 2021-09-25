<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
 protected $table = 'ticket';

 	 
 public function getAssignDetail(){
 	return $this->hasOne('App\Models\AssignTicket','ticket_id','id');
 }

  public function getCustomerName(){
 	return $this->hasOne('App\Models\Ictran','id','ictran_id');
 }

}
