<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','email','phone','department_id', 'possition_id', 'designation'
    ];



    public function department()
    {
        // class, foregin key, local key
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }


    public function position()
    {
        return $this->belongsTo(Possition::class, 'possition_id', 'id');
    }
}
