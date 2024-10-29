<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data1 extends Model
{
    use HasFactory;

    protected $fillable = ['pir', 'temperature', 'gas', 'humidity'];
}
