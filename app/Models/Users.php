<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;

class Users extends Authenticatable
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'fullname', 'username', 'email', 'password','plain_pass','mobile_no', 'job_title', 'company_name', 'company_address', 'profile_picture', 'forgot_password_code'
    ];

    protected $hidden = [
        'password', 'status', 'remember_token', 'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    protected function getProfilePictureAttribute($value)
    {
        $profile_picture = $this->attributes['profile_picture'];
        if ($profile_picture != "") {
            return url('storage/' . $profile_picture);
        } else {
            return null;
        }
    }

    // get user role
    
}
