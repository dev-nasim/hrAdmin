<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=['department_name'];

    public function employee()
    {
        // class, foregin key, local key
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }
}
