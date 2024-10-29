<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawHistory extends Model
{
    use HasFactory;

    protected $fillable = ['percentage_malicious', 'crime_scene', 'data'];
}
