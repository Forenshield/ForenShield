<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeSceneInvestigator extends Model
{
    use HasFactory;

    protected $fillable = ['crime_scene', 'investigator'];

    protected $appends = ['from', 'to'];

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'investigator');
    }

    public function getFromAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function getToAttribute()
    {
        return $this->updated_at->format('Y-m-d');
    }
}
