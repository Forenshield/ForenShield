<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAnalytics extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'percentage', 'result', 'crime_scene'];
}
