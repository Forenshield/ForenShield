<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouterAnalytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_scene',
        'ip',
        'result',
        'first_seen',
        'os_guess',
        'open_ports',
        'latency',
        'vendor',
        'hostname',
        'mac'
    ];
}
