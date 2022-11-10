<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Possition extends Model
{
    use HasFactory;
    protected $fillable=['possition', 'possition_details'];
}
