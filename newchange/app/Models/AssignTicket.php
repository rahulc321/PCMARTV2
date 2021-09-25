<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignTicket extends Model
{
 protected $table = 'ticket_assign';

 	 
 public function getTicketUser(){
 	return $this->hasOne('App\User','id','user_id');
 }

 public function assignBy(){
 	return $this->hasOne('App\User','id','assigned_by');
 }

}
