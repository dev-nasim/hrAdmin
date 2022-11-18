<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = "user_roles";


    public function role(){
        return $this->hasOne(Role::class, 'role_id', 'id');
    }


    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
