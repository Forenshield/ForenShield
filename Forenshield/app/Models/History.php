<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['nic', 'type', 'in', 'out', 'amount', 'is_new'];

    public function pricings()
    {
        return $this->hasOne(Pricing::class, 'type', 'type');
    }
}
