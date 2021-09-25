<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ramsey\Uuid\Uuid;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    

    // protected $hidden = [
    //     'status', 'created_at', 'updated_at'
    // ];

    public function checkRole(){
    	return $this->hasMany('\App\User','user_type','id');
    }

    
}
