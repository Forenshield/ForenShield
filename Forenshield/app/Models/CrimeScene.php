<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeScene extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function history()
    {
        return $this->hasMany(CrimeSceneInvestigator::class, 'crime_scene', 'id')->with('userData');
    }

    public function investigatorsData()
    {
        return $this->hasOne(CrimeSceneInvestigator::class, 'crime_scene', 'id')->with('userData')->latest();
    }
}
