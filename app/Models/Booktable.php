<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booktable extends Model
{
    protected $fillable = ['name', 'email', 'date', 'time', 'people', 'requests', 'phone'];
    use HasFactory;
}
